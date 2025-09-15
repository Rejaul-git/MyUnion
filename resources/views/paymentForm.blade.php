<!-- @extends('layouts.app')

@section('title', 'মেয়েমেন্ট ফরম')

@section('content') -->

<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নিরাপদ পেমেন্ট - ইউনিয়ন পরিষদ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Bengali', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .payment-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .payment-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .security-badges {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .security-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-bar-container {
            background: #f8f9fa;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e9ecef;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
        }

        .step-circle.completed {
            background: #28a745;
        }

        .step-circle.active {
            background: #007bff;
        }

        .step-circle.pending {
            background: #dee2e6;
            color: #6c757d;
        }

        .payment-content {
            padding: 2rem;
        }

        .order-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 5px solid #28a745;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .summary-item:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 1.1rem;
            color: #28a745;
        }

        .amount-display {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .total-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .payment-methods {
            margin-bottom: 2rem;
        }

        .method-tabs {
            border: none;
            background: none;
        }

        .nav-pills .nav-link {
            border-radius: 25px;
            padding: 1rem 1.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border: 2px solid #e9ecef;
            color: #6c757d;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-color: #007bff;
            color: white;
        }

        .tab-content {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 1rem;
        }

        .mobile-banking-form,
        .card-form,
        .bank-form {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .provider-selection {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .provider-option {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .provider-option:hover {
            border-color: #007bff;
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0, 123, 255, 0.2);
        }

        .provider-option.selected {
            border-color: #007bff;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        }

        .provider-logo {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .bkash {
            background: #e2136e;
        }

        .nagad {
            background: #f47920;
        }

        .rocket {
            background: #8e44ad;
        }

        .upay {
            background: #ff6b35;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .card-logos {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .card-logo {
            width: 40px;
            height: 25px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .visa {
            background: #1434cb;
            color: white;
        }

        .mastercard {
            background: #eb001b;
            color: white;
        }

        .amex {
            background: #006fcf;
            color: white;
        }

        .input-group {
            margin-bottom: 1rem;
        }

        .input-group-text {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #e9ecef;
            border-right: none;
        }

        .btn-pay {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 25px;
            padding: 1rem 3rem;
            font-weight: 700;
            color: white;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 25px rgba(40, 167, 69, 0.4);
        }

        .btn-pay:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
        }

        .loading-spinner {
            display: none;
            margin-right: 0.5rem;
        }

        .security-info {
            background: linear-gradient(135deg, #e8f5e8 0%, #d4edda 100%);
            border: 1px solid #c3e6cb;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .terms-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #007bff;
        }

        .transaction-info {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .otp-section {
            display: none;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1rem;
            text-align: center;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border: 2px solid #dee2e6;
            border-radius: 10px;
        }

        .otp-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        @media (max-width: 768px) {
            .payment-content {
                padding: 1rem;
            }

            .provider-selection {
                grid-template-columns: repeat(2, 1fr);
            }

            .progress-steps {
                flex-direction: column;
                gap: 0.5rem;
            }

            .total-amount {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <!-- Payment Header -->
        <div class="payment-header">
            <h2><i class="bi bi-shield-lock me-2"></i>নিরাপদ পেমেন্ট</h2>
            <p class="mb-3">আপনার পেমেন্ট সম্পূর্ণ নিরাপদ এবং এনক্রিপ্টেড</p>
            <div class="security-badges">
                <div class="security-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>SSL সুরক্ষিত</span>
                </div>
                <div class="security-badge">
                    <i class="bi bi-lock"></i>
                    <span>256-bit এনক্রিপ্শন</span>
                </div>
                <div class="security-badge">
                    <i class="bi bi-check-circle"></i>
                    <span>PCI অনুমোদিত</span>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar-container">
            <div class="progress-steps">
                <div class="progress-step">
                    <div class="step-circle completed">✓</div>
                    <span>সেবা নির্বাচন</span>
                </div>
                <div class="progress-step">
                    <div class="step-circle active">2</div>
                    <span>পেমেন্ট</span>
                </div>
                <div class="progress-step">
                    <div class="step-circle pending">3</div>
                    <span>নিশ্চিতকরণ</span>
                </div>
            </div>
        </div>

        <!-- Payment Content -->
        <div class="payment-content">
            <!-- Order Summary -->
            <div class="order-summary">
                <h4 class="mb-3"><i class="bi bi-receipt me-2"></i>অর্ডার সামারি</h4>
                <div class="summary-item">
                    <span>সেবা</span>
                    <span>জন্ম সনদপত্র</span>
                </div>
                <div class="summary-item">
                    <span>সেবা ফি</span>
                    <span>৫০ টাকা</span>
                </div>
                <div class="summary-item">
                    <span>প্রসেসিং ফি</span>
                    <span>৫ টাকা</span>
                </div>
                <div class="summary-item">
                    <span>VAT (৫%)</span>
                    <span>২.৭৫ টাকা</span>
                </div>
                <div class="summary-item">
                    <span><strong>মোট পেমেন্ট</strong></span>
                    <span><strong>৫৭.৭৫ টাকা</strong></span>
                </div>
            </div>

            <!-- Amount Display -->
            <div class="amount-display">
                <div class="total-amount">৫৭.৭৫ টাকা</div>
                <p class="mb-0">পেমেন্ট করার জন্য প্রস্তুত</p>
            </div>

            <!-- Transaction Info -->
            <div class="transaction-info">
                <div class="row">
                    <div class="col-md-6">
                        <strong>ট্রানজেকশন ID:</strong> TXN-{{ date('Y') }}-{{ rand(100000, 999999) }}
                    </div>
                    <div class="col-md-6">
                        <strong>আবেদন ID:</strong> {{ $application->application_no ?? 'APP-BC-' . date('Y') . '-' . rand(1000, 9999) }}
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="payment-methods">
                <h4 class="mb-3"><i class="bi bi-credit-card me-2"></i>পেমেন্ট পদ্ধতি নির্বাচন করুন</h4>

                <ul class="nav nav-pills method-tabs" id="paymentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="mobile-tab" data-bs-toggle="pill" data-bs-target="#mobile" type="button" role="tab">
                            <i class="bi bi-phone me-2"></i>মোবাইল ব্যাংকিং
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cash-tab" data-bs-toggle="pill" data-bs-target="#cash" type="button" role="tab">
                            <i class="bi bi-cash me-2"></i>ক্যাশ অন ডেলিভারি
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="paymentTabsContent">
                    <!-- Mobile Banking -->
                    <div class="tab-pane fade show active" id="mobile" role="tabpanel">
                        <div class="mobile-banking-form">
                            <h5 class="mb-3">মোবাইল ব্যাংকিং প্রোভাইডার নির্বাচন করুন</h5>

                            <div class="provider-selection">
                                <div class="provider-option" onclick="selectProvider('bkash')">
                                    <div class="provider-logo bkash">bK</div>
                                    <div class="provider-name">bKash</div>
                                </div>
                                <div class="provider-option" onclick="selectProvider('nagad')">
                                    <div class="provider-logo nagad">N</div>
                                    <div class="provider-name">Nagad</div>
                                </div>
                                <div class="provider-option" onclick="selectProvider('rocket')">
                                    <div class="provider-logo rocket">R</div>
                                    <div class="provider-name">Rocket</div>
                                </div>
                                <div class="provider-option" onclick="selectProvider('upay')">
                                    <div class="provider-logo upay">U</div>
                                    <div class="provider-name">Upay</div>
                                </div>
                            </div>

                            <form id="mobileForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">মোবাইল নম্বর</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-phone"></i>
                                            </span>
                                            <input type="tel" class="form-control" placeholder="01712345678" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">পিন নম্বর</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" placeholder="****" maxlength="4" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- OTP Section -->
                                <div class="otp-section" id="otpSection">
                                    <h5>OTP ভেরিফিকেশন</h5>
                                    <p>আপনার মোবাইলে পাঠানো ৬ সংখ্যার কোড লিখুন</p>
                                    <div class="otp-inputs">
                                        <input type="text" class="otp-input" maxlength="1">
                                        <input type="text" class="otp-input" maxlength="1">
                                        <input type="text" class="otp-input" maxlength="1">
                                        <input type="text" class="otp-input" maxlength="1">
                                        <input type="text" class="otp-input" maxlength="1">
                                        <input type="text" class="otp-input" maxlength="1">
                                    </div>
                                    <button type="button" class="btn btn-outline-primary">OTP পুনরায় পাঠান</button>
                                </div>
                                
                                <!-- Hidden input for application ID -->
                                <input type="hidden" name="application_id" value="{{ $application->id ?? '' }}">
                            </form>
                        </div>
                    </div>
                    <!-- Cash on Delivery -->
                    <div class="tab-pane fade" id="cash" role="tabpanel">
                        <div class="text-center py-4">
                            <i class="bi bi-truck" style="font-size: 4rem; color: #28a745; margin-bottom: 1rem;"></i>
                            <h5>ক্যাশ অন ডেলিভারি</h5>
                            <p>সনদ ডেলিভারির সময় নগদ অর্থ প্রদান করুন</p>
                            <div class="alert alert-warning">
                                <strong>অতিরিক্ত ফি:</strong> ডেলিভারি চার্জ ২০ টাকা
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ডেলিভারি ঠিকানা</label>
                                <textarea class="form-control" rows="3" placeholder="সম্পূর্ণ ঠিকানা লিখুন" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Security Info -->
            <div class="security-info">
                <i class="bi bi-shield-check fs-3 text-success mb-2"></i>
                <p class="mb-0"><strong>আপনার তথ্য সম্পূর্ণ নিরাপদ</strong><br>
                    আমরা আপনার ব্যক্তিগত এবং পেমেন্ট তথ্য সুরক্ষিত রাখতে সর্বোচ্চ মানের এনক্রিপ্শন ব্যবহার করি।</p>
            </div>

            <!-- Terms and Conditions -->
            <div class="terms-checkbox">
                <input type="checkbox" id="terms" required>
                <label for="terms">
                    আমি <a href="#" class="text-primary">শর্তাবলী</a> এবং
                    <a href="#" class="text-primary">গোপনীয়তা নীতি</a> সম্মত আছি
                </label>
            </div>

            <!-- Payment Button -->
            <form id="paymentForm" action="{{ route('birthcertificate.process.payment') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="application_id" value="{{ $application->id ?? '' }}">
                <button type="submit" class="btn btn-pay" id="paymentBtn">
                    <span class="loading-spinner spinner-border spinner-border-sm" role="status"></span>
                    <i class="bi bi-shield-lock me-2"></i>
                    নিরাপদে পেমেন্ট করুন
                </button>
            </form>
        </div>
    </div>
    <!-- @endsection -->