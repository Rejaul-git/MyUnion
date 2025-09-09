<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Determine registration type and validate accordingly
        $birth_num = $request->input('birth_num');
        $nid = $request->input('nid');
        $name = $request->input('name');

        // Base validation
        $validationRules = [
            'phone' => ['required', 'unique:users', 'regex:/^01[3-9]\d{8}$/'],
            'email' => ['nullable', 'email', 'unique:users'],
            'date_of_birth' => ['required', 'date'],
            'policy' => ['required', 'accepted'],
        ];

        // Type-specific validation
        if ($birth_num) {
            // Birth registration
            $validationRules['birth_num'] = ['required', 'unique:users', 'string'];
            $validationRules['name'] = ['nullable', 'string'];
        } elseif ($nid) {
            // NID registration
            $validationRules['nid'] = ['required', 'unique:users', 'string'];
            $validationRules['name'] = ['nullable', 'string'];
        } elseif ($name) {
            // General registration
            $validationRules['name'] = ['required', 'string', 'max:255'];
            $validationRules['email'] = ['required', 'email', 'unique:users'];
        } else {
            return back()->withErrors(['registration_type' => 'Please select a valid registration type.']);
        }

        $request->validate($validationRules);

        $otp = rand(10000, 99999);
        $expiresAt = Carbon::now()->addMinutes(10);

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'birth_num' => $birth_num,
            'nid' => $nid,
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
            'is_verified' => false,
        ]);

        // OTP send
        Mail::raw("আপনার OTP কোড: {$otp}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('রেজিস্ট্রেশন OTP');
        });

        return redirect()->route('verify.otp.form')->with('status', 'OTP ইমেইলে পাঠানো হয়েছে।');
    }

    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:5',
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'ভুল OTP অথবা OTP এর সময় শেষ হয়েছে।']);
        }

        // Random password তৈরি করবো
        $plainPassword = 'P@ss' . rand(1000, 9999);

        $user->update([
            'otp' => null,
            'otp_expires_at' => null,
            'is_verified' => true,
            'password' => Hash::make($plainPassword),
        ]);

        // Login info পাঠাও
        Mail::raw("আপনার একাউন্ট তৈরি হয়েছে!\n\nলগইন ইমেইল: {$user->email}\nফোন: {$user->phone}\nপাসওয়ার্ড: {$plainPassword}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে');
        });

        Auth::login($user);

        return redirect()->route('home')->with('status', 'রেজিস্ট্রেশন সম্পূর্ণ হয়েছে!');
    }
}
