<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileFormController extends Controller
{
    /**
     * Display profile form
     */
    public function create()
    {
        $profile = Auth::user()->profile;
        return view('user.profileform', compact('profile'));
    }

    /**
     * Store profile data
     */
    public function store(Request $request)
    {
        $request->validate([
            // Required fields
            'name_en' => 'required|string|max:255',
            'name_bn' => 'required|string|max:255',
            'father_name_en' => 'required|string|max:255',
            'father_name_bn' => 'required|string|max:255',
            'mother_name_en' => 'required|string|max:255',
            'mother_name_bn' => 'required|string|max:255',
            'mobile' => [
                'required',
                'string',
                'regex:/^01[3-9]\d{8}$/',
                Rule::unique('profiles')->ignore(Auth::user()->profile?->id)
            ],
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',

            // Current Address (Required)
            'current_division' => 'required|string|max:255',
            'current_district' => 'required|string|max:255',
            'current_upazila' => 'required|string|max:255',
            'current_union' => 'required|string|max:255',
            'current_ward' => 'required|string|max:50',
            'current_village' => 'required|string|max:255',
            'current_full_address' => 'required|string|max:1000',

            // Optional fields
            'spouse_name_en' => 'nullable|string|max:255',
            'spouse_name_bn' => 'nullable|string|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('profiles')->ignore(Auth::user()->profile?->id)
            ],
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'current_post_office' => 'nullable|string|max:255',
            'current_post_code' => 'nullable|string|max:10',

            // Permanent Address (Required if not same as current)
            'permanent_division' => 'required_unless:same_as_current,on|string|max:255',
            'permanent_district' => 'required_unless:same_as_current,on|string|max:255',
            'permanent_upazila' => 'required_unless:same_as_current,on|string|max:255',
            'permanent_union' => 'required_unless:same_as_current,on|string|max:255',
            'permanent_ward' => 'required_unless:same_as_current,on|string|max:50',
            'permanent_village' => 'required_unless:same_as_current,on|string|max:255',
            'permanent_full_address' => 'required_unless:same_as_current,on|string|max:1000',
            'permanent_post_office' => 'nullable|string|max:255',
            'permanent_post_code' => 'nullable|string|max:10',

            // File uploads (Required)
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nid_document' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
        ], [
            'name_en.required' => 'ইংরেজিতে নাম আবশ্যক।',
            'name_bn.required' => 'বাংলায় নাম আবশ্যক।',
            'father_name_en.required' => 'ইংরেজিতে পিতার নাম আবশ্যক।',
            'father_name_bn.required' => 'বাংলায় পিতার নাম আবশ্যক।',
            'mother_name_en.required' => 'ইংরেজিতে মাতার নাম আবশ্যক।',
            'mother_name_bn.required' => 'বাংলায় মাতার নাম আবশ্যক।',
            'mobile.required' => 'মোবাইল নম্বর আবশ্যক।',
            'mobile.regex' => 'বৈধ বাংলাদেশি মোবাইল নম্বর দিন।',
            'mobile.unique' => 'এই মোবাইল নম্বর ইতিমধ্যে ব্যবহৃত হয়েছে।',
            'birth_date.required' => 'জন্ম তারিখ আবশ্যক।',
            'birth_date.before' => 'জন্ম তারিখ আজকের থেকে আগে হতে হবে।',
            'gender.required' => 'লিঙ্গ নির্বাচন করুন।',
            'current_division.required' => 'বর্তমান বিভাগ আবশ্যক।',
            'current_district.required' => 'বর্তমান জেলা আবশ্যক।',
            'current_upazila.required' => 'বর্তমান উপজেলা আবশ্যক।',
            'current_union.required' => 'বর্তমান ইউনিয়ন আবশ্যক।',
            'current_ward.required' => 'বর্তমান ওয়ার্ড নং আবশ্যক।',
            'current_village.required' => 'বর্তমান গ্রাম/এলাকা আবশ্যক।',
            'current_full_address.required' => 'বর্তমান সম্পূর্ণ ঠিকানা আবশ্যক।',
            'photo.required' => 'ছবি আপলোড করুন।',
            'photo.image' => 'ছবি ফাইল হতে হবে।',
            'photo.max' => 'ছবির আকার ২MB এর বেশি হতে পারবে না।',
            'nid_document.required' => 'NID/জন্ম নিবন্ধন সনদ আপলোড করুন।',
            'nid_document.max' => 'ডকুমেন্টের আকার ৫MB এর বেশি হতে পারবে না।',
            'email.email' => 'বৈধ ইমেইল ঠিকানা দিন।',
            'email.unique' => 'এই ইমেইল ইতিমধ্যে ব্যবহৃত হয়েছে।',
        ]);

        try {
            $profileData = $request->only([
                'name_en',
                'name_bn',
                'father_name_en',
                'father_name_bn',
                'mother_name_en',
                'mother_name_bn',
                'spouse_name_en',
                'spouse_name_bn',
                'email',
                'mobile',
                'birth_date',
                'gender',
                'marital_status',
                'current_division',
                'current_district',
                'current_upazila',
                'current_union',
                'current_ward',
                'current_village',
                'current_post_office',
                'current_post_code',
                'current_full_address',
                'permanent_division',
                'permanent_district',
                'permanent_upazila',
                'permanent_union',
                'permanent_ward',
                'permanent_village',
                'permanent_post_office',
                'permanent_post_code',
                'permanent_full_address'
            ]);

            // Handle same address checkbox
            if ($request->has('same_as_current')) {
                $profileData['same_as_current'] = true;
                $profileData['permanent_division'] = $profileData['current_division'];
                $profileData['permanent_district'] = $profileData['current_district'];
                $profileData['permanent_upazila'] = $profileData['current_upazila'];
                $profileData['permanent_union'] = $profileData['current_union'];
                $profileData['permanent_ward'] = $profileData['current_ward'];
                $profileData['permanent_village'] = $profileData['current_village'];
                $profileData['permanent_post_office'] = $profileData['current_post_office'];
                $profileData['permanent_post_code'] = $profileData['current_post_code'];
                $profileData['permanent_full_address'] = $profileData['current_full_address'];
            } else {
                $profileData['same_as_current'] = false;
            }

            $profileData['user_id'] = Auth::id();

            // Handle file uploads
            if ($request->hasFile('photo')) {
                $profileData['photo_path'] = $request->file('photo')->store('profiles/photos', 'public');
            }

            if ($request->hasFile('nid_document')) {
                $profileData['nid_path'] = $request->file('nid_document')->store('profiles/documents', 'public');
            }

            // Update or create profile
            $profile = Profile::updateOrCreate(
                ['user_id' => Auth::id()],
                $profileData
            );

            return redirect()->route('user.dashboard')->with('success', 'প্রোফাইল সফলভাবে সংরক্ষিত হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'একটি ত্রুটি হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।')->withInput();
        }
    }

    /**
     * Show success page
     */

    /**
     * Show profile details
     */
    public function show()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            return redirect()->route('profile.create');
        }

        return view('profile.show', compact('profile'));
    }

    /**
     * Validate profile data
     */
}
