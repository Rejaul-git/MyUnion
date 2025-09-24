@extends('layouts.user')
@section('title', 'হোল্ডিং ট্যাক্স পরিশোধ | ইউনিয়ন পরিষদ নাগরিক সেবা')
@section('content')
<style>
    .header-section {
        background: linear-gradient(135deg, #2c5530 0%, #4a7c59 100%);
        color: white;
        padding: 60px 0 40px;
        text-align: center;
    }

    .header-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .header-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 20px;
    }

    .breadcrumb-nav {
        background: none;
        padding: 0;
    }

    .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: white;
    }

    .main-content {
        padding: 40px 0;
    }

    .tax-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        border-left: 5px solid #4caf50;
    }

    .tax-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .tax-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #4caf50;
    }

    .tax-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 10px;
    }

    .tax-description {
        color: #666;
        margin-bottom: 15px;
    }

    .tax-features {
        margin-bottom: 20px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        color: #555;
    }

    .feature-icon {
        width: 16px;
        height: 16px;
        background: #4caf50;
        border-radius: 50%;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .pay-btn {
        background: linear-gradient(135deg, #4caf50, #45a049);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .pay-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        color: white;
    }

    .payment-form {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        margin-top: 20px;
    }

    .form-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 25px;
        text-align: center;
    }

    .form-section {
        margin-bottom: 25px;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 15px;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 5px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4caf50;
        box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
    }

    .required {
        color: #dc3545;
    }

    .amount-display {
        background: linear-gradient(135deg, #e8f5e8, #f0f8f0);
        border: 2px solid #4caf50;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin: 20px 0;
    }

    .amount-label {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 10px;
    }

    .amount-value {
        font-size: 2rem;
        font-weight: 700;
        color: #4caf50;
    }

    .payment-methods {
        margin-top: 25px;
    }

    .payment-method {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .payment-method:hover {
        border-color: #4caf50;
        background: rgba(76, 175, 80, 0.05);
    }

    .payment-method.selected {
        border-color: #4caf50;
        background: rgba(76, 175, 80, 0.1);
    }

    .method-icon {
        font-size: 1.5rem;
        margin-right: 10px;
    }

    .submit-btn {
        background: linear-gradient(135deg, #4caf50, #45a049);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 15px 40px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(76, 175, 80, 0.3);
    }

    .back-btn {
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: #5a6268;
        color: white;
    }

    .alert {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 20px;
    }

    .alert-info {
        background: rgba(13, 202, 240, 0.1);
        color: #0c5460;
        border-left: 4px solid #0dcaf0;
    }

    .tax-calculator {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .calculator-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 20px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 2rem;
        }

        .tax-card {
            padding: 20px;
        }

        .payment-form {
            padding: 20px;
        }
    }
</style>

<!-- Header Section -->
<section class="header-section">
    <div class="container">
        <h1 class="header-title">হোল্ডিং ট্যাক্স পরিশোধ</h1>
        <p class="header-subtitle">
            আপনার হোল্ডিং ট্যাক্স অনলাইনে পরিশোধ করুন
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-nav justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">ড্যাশবোর্ড</a></li>
                <li class="breadcrumb-item"><a href="">ট্যাক্স ড্যাশবোর্ড</a></li>
                <li class="breadcrumb-item active">ট্যাক্স পরিশোধ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="payment-form">
                    <h3 class="form-title">হোল্ডিং ট্যাক্স পরিশোধ</h3>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('tax.payment.process') }}">
                        @csrf
                        <input type="hidden" name="tax_type" value="holding" />

                        <!-- Property Information -->
                        <div class="form-section">
                            <h4 class="section-title">সম্পত্তির তথ্য</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">হোল্ডিং নম্বর <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="holding_number" value="{{ $holdingNumber ?? '' }}" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">জাতীয় পরিচয়পত্র নম্বর <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nid_number" value="{{ auth()->user()->nid ?? '' }}" readonly />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">মালিকের নাম <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="owner_name" value="{{ auth()->user()->name ?? '' }}" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                                    <input type="tel" class="form-control" name="mobile_number" value="{{ auth()->user()->phone ?? '' }}" readonly />
                                </div>
                            </div>
                        </div>

                        <!-- Tax Calculation -->
                        <div class="form-section">
                            <h4 class="section-title">কর হিসাব</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">কর বছর</label>
                                    <select class="form-select" name="tax_year">
                                        @php
                                        $currentYear = date('Y');
                                        @endphp
                                        @for($i = 0; $i < 5; $i++)
                                            <option value="{{ $currentYear - $i }}" {{ $i == 0 ? 'selected' : '' }}>{{ $currentYear - $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">কর পরিশোধের ধরন</label>
                                    <select class="form-select" name="payment_type">
                                        <option value="annual">বার্ষিক</option>
                                        <option value="quarterly">ত্রৈমাসিক</option>
                                        <option value="monthly">মাসিক</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Amount Display -->
                            <div class="amount-display">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="amount-label">মূল কর</div>
                                        <div class="amount-value" id="baseTax">৳ {{ number_format($taxAmount ?? 0) }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="amount-label">জরিমানা</div>
                                        <div class="amount-value" id="penalty">৳ 0</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="amount-label">মোট পরিশোধনীয়</div>
                                        <div class="amount-value" id="totalAmount">৳ {{ number_format($taxAmount ?? 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="form-section">
                            <h4 class="section-title">পরিশোধ পদ্ধতি</h4>
                            <div class="payment-methods">
                                <div class="payment-method" onclick="selectPaymentMethod('bkash')">
                                    <span class="method-icon">📱</span>
                                    <strong>বিকাশ</strong> - মোবাইল ব্যাংকিং
                                </div>
                                <div class="payment-method" onclick="selectPaymentMethod('nagad')">
                                    <span class="method-icon">💳</span>
                                    <strong>নগদ</strong> - মোবাইল ব্যাংকিং
                                </div>
                                <div class="payment-method" onclick="selectPaymentMethod('rocket')">
                                    <span class="method-icon">🚀</span>
                                    <strong>রকেট</strong> - মোবাইল ব্যাংকিং
                                </div>
                                <div class="payment-method" onclick="selectPaymentMethod('bank')">
                                    <span class="method-icon">🏦</span>
                                    <strong>ব্যাংক ট্রান্সফার</strong> - অনলাইন ব্যাংকিং
                                </div>
                                <div class="payment-method" onclick="selectPaymentMethod('card')">
                                    <span class="method-icon">💳</span>
                                    <strong>ক্রেডিট/ডেবিট কার্ড</strong>
                                </div>
                            </div>
                            <input type="hidden" name="payment_method" id="paymentMethod" required />
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <input type="hidden" name="tax_amount" value="{{ $taxAmount ?? 0 }}" />
                            <button type="submit" class="submit-btn">পরিশোধ করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function selectPaymentMethod(method) {
        // Remove selected class from all methods
        document.querySelectorAll(".payment-method").forEach((el) => {
            el.classList.remove("selected");
        });

        // Add selected class to clicked method
        event.target.closest(".payment-method").classList.add("selected");

        // Set the hidden input value
        document.getElementById("paymentMethod").value = method;
    }

    // Form submission
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        if (form) {
            form.addEventListener("submit", function(e) {
                const selectedMethod = document.querySelector(".payment-method.selected");
                if (!selectedMethod) {
                    e.preventDefault();
                    alert("দয়া করে পরিশোধ পদ্ধতি নির্বাচন করুন।");
                    return;
                }
            });
        }
    });
</script>
@endsection