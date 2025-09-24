<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tax;
use App\Models\User;

class TaxController extends Controller
{
    public function dashboard()
    {
        // Check if user has a holding number
        $user = Auth::user();
        $profile = $user->profile;
        $hasHoldingNumber = $profile && $profile->holding_number;

        // Get user's tax payments
        $taxPayments = Tax::where('user_id', $user->id)->latest()->get();
        // $taxPayments = $user->taxes()->latest()->get();

        return view('user.taxPaymentDashboard', compact('hasHoldingNumber', 'taxPayments'));
    }

    public function showHoldingNumberForm()
    {
        return view('user.holdingNumberForm');
    }

    public function storeHoldingNumber(Request $request)
    {
        $request->validate([
            'holding_number' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Update user's profile with holding number
        $profile = $user->profile;
        if ($profile) {
            $profile->update(['holding_number' => $request->holding_number]);
        } else {
            // Create profile if it doesn't exist
            $user->profile()->create(['holding_number' => $request->holding_number]);
        }

        return redirect()->route('tax.dashboard')->with('success', 'হোল্ডিং নম্বর সফলভাবে সংরক্ষিত হয়েছে।');
    }

    public function showPaymentForm()
    {
        $user = Auth::user();
        $profile = $user->profile;
        $holdingNumber = $profile ? $profile->holding_number : null;

        // Calculate tax amount based on holding number or other criteria
        $taxAmount = $holdingNumber ? 1000 : 0; // Example calculation

        return view('tax.taxsSubmitForm', compact('holdingNumber', 'taxAmount'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'tax_amount' => 'required|numeric|min:0',
            'holding_number' => 'required|string|max:255',
            'tax_year' => 'required|integer',
            'payment_type' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();

        // Create tax payment record
        $taxPayment = new Tax();
        $taxPayment->user_id = $user->id;
        $taxPayment->holding_number = $request->holding_number;
        $taxPayment->tax_amount = $request->tax_amount;
        $taxPayment->payment_status = 'paid';
        $taxPayment->save();

        return redirect()->route('tax.dashboard')->with('success', 'ট্যাক্স পেমেন্ট সফলভাবে সম্পন্ন হয়েছে।');
    }

    public function downloadInvoice($id)
    {
        $taxPayment = Tax::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        // Return the invoice view
        return view('tax.invoice', compact('taxPayment'));
    }
}
