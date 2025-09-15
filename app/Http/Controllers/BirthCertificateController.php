<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BirthCertificateController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'applicant_name_bn' => 'required|string|max:255',
            'applicant_name_en' => 'required|string|max:255',
            'father_name_bn' => 'required|string|max:255',
            'father_name_en' => 'required|string|max:255',
            'mother_name_bn' => 'required|string|max:255',
            'mother_name_en' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'birth_registration_number' => 'nullable|string|max:255',
            'birth_place' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'upazila' => 'required|string|max:255',
            'union' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'present_address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nid' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
            'birth_registration_document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new birth certificate record
        $birthCertificate = new BirthCertificate();
        $birthCertificate->application_no = $this->generateApplicationNumber();
        $birthCertificate->user_id = Auth::id();
        $birthCertificate->applicant_name_bn = $request->applicant_name_bn;
        $birthCertificate->applicant_name_en = $request->applicant_name_en;
        $birthCertificate->father_name_bn = $request->father_name_bn;
        $birthCertificate->father_name_en = $request->father_name_en;
        $birthCertificate->mother_name_bn = $request->mother_name_bn;
        $birthCertificate->mother_name_en = $request->mother_name_en;
        $birthCertificate->date_of_birth = $request->date_of_birth;
        $birthCertificate->gender = $request->gender;
        $birthCertificate->birth_registration_number = $request->birth_registration_number;
        $birthCertificate->birth_place = $request->birth_place;
        $birthCertificate->district = $request->district;
        $birthCertificate->upazila = $request->upazila;
        $birthCertificate->union = $request->union;
        $birthCertificate->mobile_number = $request->mobile_number;
        $birthCertificate->email = $request->email;
        $birthCertificate->present_address = $request->present_address;

        // Handle file uploads
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('birth_certificate_photos', 'public');
            $birthCertificate->photo_path = $photoPath;
        }

        if ($request->hasFile('nid')) {
            $nidPath = $request->file('nid')->store('birth_certificate_nid', 'public');
            $birthCertificate->nid_path = $nidPath;
        }

        if ($request->hasFile('birth_registration_document')) {
            $birthRegPath = $request->file('birth_registration_document')->store('birth_certificate_reg', 'public');
            $birthCertificate->birth_registration_path = $birthRegPath;
        }

        // Save the birth certificate record
        $birthCertificate->save();

        // Redirect to payment form with application details
        return redirect()->route('payment.form', ['application_id' => $birthCertificate->id]);
    }

    private function generateApplicationNumber()
    {
        // Generate a unique application number
        return 'APP-BC-' . date('Y') . '-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function paymentForm($application_id)
    {
        $application = BirthCertificate::findOrFail($application_id);
        return view('paymentForm', compact('application'));
    }

    public function processPayment(Request $request)
    {
        $application = BirthCertificate::findOrFail($request->application_id);
        
        // Update payment status to paid
        $application->payment_status = 'paid';
        $application->save();
        
        // Redirect back with success message
        return redirect()->route('user.dashboard')->with('success', 'পেমেন্ট সফলভাবে সম্পন্ন হয়েছে। আপনার আবেদন প্রক্রিয়াধীন রয়েছে।');
    }
}