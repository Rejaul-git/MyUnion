@extends('layouts.app')
@section('title', 'কর পরিশোধ | স্মার্ট নাগরিক সেবা')
@section('content')
<!-- <!DOCTYPE html>
<html lang="bn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>কর পরিশোধ | স্মার্ট নাগরিক সেবা</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" /> -->
<style>
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Hind Siliguri", sans-serif;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
      } */

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
        display: none;
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
<!-- </head>

<body> -->
<!-- Header Section -->
<section class="header-section">
    <div class="container">
        <h1 class="header-title">কর পরিশোধ</h1>
        <p class="header-subtitle">
            হোল্ডিং ট্যাক্স, খাজনা এবং অন্যান্য স্থানীয় কর অনলাইনে পরিশোধ করুন
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-nav justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">হোম</a></li>
                <li class="breadcrumb-item"><a href="#services">সেবাসমূহ</a></li>
                <li class="breadcrumb-item active">কর পরিশোধ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="main-content">
    <div class="container">
        <!-- Tax Calculator -->
        <div class="tax-calculator">
            <h3 class="calculator-title">কর ক্যালকুলেটর</h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">সম্পত্তির ধরন</label>
                    <select
                        class="form-select"
                        id="propertyType"
                        onchange="calculateTax()">
                        <option value="">নির্বাচন করুন</option>
                        <option value="residential">আবাসিক</option>
                        <option value="commercial">বাণিজ্যিক</option>
                        <option value="industrial">শিল্প</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">সম্পত্তির আয়তন (বর্গফুট)</label>
                    <input
                        type="number"
                        class="form-control"
                        id="propertySize"
                        onchange="calculateTax()"
                        placeholder="0" />
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">প্রতি বর্গফুট মূল্য (টাকা)</label>
                    <input
                        type="number"
                        class="form-control"
                        id="pricePerSqft"
                        onchange="calculateTax()"
                        placeholder="0" />
                </div>
            </div>
            <div class="amount-display">
                <div class="amount-label">আনুমানিক বার্ষিক কর</div>
                <div class="amount-value" id="calculatedTax">৳ 0</div>
            </div>
        </div>

        <!-- Tax Selection -->
        <div id="tax-selection">
            <div class="alert alert-info">
                <strong>তথ্য:</strong> আপনার প্রয়োজনীয় কর পরিশোধের ধরন নির্বাচন
                করুন এবং পরিশোধের জন্য ক্লিক করুন।
            </div>

            <div class="row">
                <!-- হোল্ডিং ট্যাক্স -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('holding')">
                        <div class="tax-icon">🏠</div>
                        <h3 class="tax-title">হোল্ডিং ট্যাক্স</h3>
                        <p class="tax-description">
                            বাড়ি, ফ্ল্যাট, দোকান ইত্যাদি সম্পত্তির উপর বার্ষিক কর।
                            সম্পত্তির মূল্য অনুযায়ী নির্ধারিত হয়।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>সম্পত্তির মূল্য অনুযায়ী হিসাব</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বার্ষিক/ত্রৈমাসিক পরিশোধ</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>অনলাইন রসিদ ডাউনলোড</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>

                <!-- খাজনা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('khajna')">
                        <div class="tax-icon">🌾</div>
                        <h3 class="tax-title">ভূমি খাজনা</h3>
                        <p class="tax-description">
                            কৃষি জমি এবং অন্যান্য ভূমির উপর সরকারি খাজনা। দাগ নম্বর
                            অনুযায়ী পরিশোধ করুন।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>দাগ নম্বর দিয়ে অনুসন্ধান</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বকেয়া হিসাব দেখুন</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>একসাথে একাধিক বছরের পরিশোধ</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>

                <!-- ব্যবসায়িক লাইসেন্স ফি -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('business')">
                        <div class="tax-icon">🏪</div>
                        <h3 class="tax-title">ব্যবসায়িক লাইসেন্স ফি</h3>
                        <p class="tax-description">
                            দোকান, ব্যবসা প্রতিষ্ঠান এবং পেশাদার সেবার জন্য বার্ষিক
                            লাইসেন্স ফি।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>ব্যবসার ধরন অনুযায়ী ফি</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>লাইসেন্স নবায়ন সুবিধা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>ডিজিটাল লাইসেন্স কপি</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>

                <!-- পানি ও স্যানিটেশন ফি -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('water')">
                        <div class="tax-icon">💧</div>
                        <h3 class="tax-title">পানি ও স্যানিটেশন ফি</h3>
                        <p class="tax-description">
                            পানি সরবরাহ, নিকাশি ব্যবস্থা এবং স্যানিটেশন সেবার জন্য
                            মাসিক/বার্ষিক ফি।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মিটার রিডিং অনুযায়ী বিল</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক/ত্রৈমাসিক পরিশোধ</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>ব্যবহারের হিস্টোরি দেখুন</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>

                <!-- রাস্তা ও অবস্থাপনা উন্নয়ন ফি -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('infrastructure')">
                        <div class="tax-icon">🛣️</div>
                        <h3 class="tax-title">অবকাঠামো উন্নয়ন ফি</h3>
                        <p class="tax-description">
                            রাস্তা, নর্দমা, পার্ক এবং অন্যান্য অবকাঠামো উন্নয়নের জন্য
                            বিশেষ ফি।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>প্রকল্প ভিত্তিক ফি</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>এলাকা অনুযায়ী হিসাব</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>উন্নয়নের অগ্রগতি দেখুন</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>

                <!-- জরিমানা ও অন্যান্য ফি -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="tax-card" onclick="showPaymentForm('penalty')">
                        <div class="tax-icon">⚖️</div>
                        <h3 class="tax-title">জরিমানা ও অন্যান্য</h3>
                        <p class="tax-description">
                            বিলম্বিত পরিশোধের জরিমানা, সার্ভিস চার্জ এবং অন্যান্য বিবিধ
                            ফি।
                        </p>
                        <div class="tax-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বিলম্বিত ফি হিসাব</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>সার্ভিস চার্জ পরিশোধ</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বিশেষ অনুমতি ফি</span>
                            </div>
                        </div>
                        <a href="#" class="pay-btn">পরিশোধ করুন</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Form (Hidden by default) -->
        <div id="payment-form" class="payment-form">
            <button class="back-btn" onclick="showTaxSelection()">
                ← ফিরে যান
            </button>

            <div class="form-title" id="form-title">কর পরিশোধ</div>

            <form id="taxPaymentForm">
                <input type="hidden" id="taxType" name="taxType" value="" />

                <!-- Property Information -->
                <div class="form-section">
                    <h4 class="section-title">সম্পত্তি/পরিচয়ের তথ্য</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">হোল্ডিং নম্বর/দাগ নম্বর
                                <span class="required">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                name="propertyNumber"
                                required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">জাতীয় পরিচয়পত্র নম্বর
                                <span class="required">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                name="nidNumber"
                                required
                                maxlength="17" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">মালিকের নাম <span class="required">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                name="ownerName"
                                required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                            <input
                                type="tel"
                                class="form-control"
                                name="mobileNumber"
                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">সম্পত্তির ঠিকানা <span class="required">*</span></label>
                            <textarea
                                class="form-control"
                                name="propertyAddress"
                                rows="3"
                                required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Tax Calculation -->
                <div class="form-section" id="tax-calculation">
                    <h4 class="section-title">কর হিসাব</h4>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">কর বছর</label>
                            <select
                                class="form-select"
                                name="taxYear"
                                onchange="updateTaxAmount()">
                                <option value="2024">২০২৪</option>
                                <option value="2023">২০২৩</option>
                                <option value="2022">২০২২</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">কর পরিশোধের ধরন</label>
                            <select
                                class="form-select"
                                name="paymentType"
                                onchange="updateTaxAmount()">
                                <option value="annual">বার্ষিক</option>
                                <option value="quarterly">ত্রৈমাসিক</option>
                                <option value="monthly">মাসিক</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">বিশেষ ছাড়</label>
                            <select
                                class="form-select"
                                name="discount"
                                onchange="updateTaxAmount()">
                                <option value="0">কোনো ছাড় নেই</option>
                                <option value="5">সময়মতো পরিশোধ (৫%)</option>
                                <option value="10">বয়স্ক নাগরিক (১০%)</option>
                                <option value="15">প্রতিবন্ধী (১৫%)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Amount Display -->
                    <div class="amount-display">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="amount-label">মূল কর</div>
                                <div class="amount-value" id="baseTax">৳ 5,000</div>
                            </div>
                            <div class="col-md-3">
                                <div class="amount-label">জরিমানা</div>
                                <div class="amount-value" id="penalty">৳ 0</div>
                            </div>
                            <div class="col-md-3">
                                <div class="amount-label">ছাড়</div>
                                <div class="amount-value" id="discount">৳ 0</div>
                            </div>
                            <div class="col-md-3">
                                <div class="amount-label">মোট পরিশোধনীয়</div>
                                <div class="amount-value" id="totalAmount">৳ 5,000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="form-section">
                    <h4 class="section-title">পরিশোধ পদ্ধতি</h4>
                    <div class="payment-methods">
                        <div
                            class="payment-method"
                            onclick="selectPaymentMethod('bkash')">
                            <span class="method-icon">📱</span>
                            <strong>বিকাশ</strong> - মোবাইল ব্যাংকিং
                        </div>
                        <div
                            class="payment-method"
                            onclick="selectPaymentMethod('nagad')">
                            <span class="method-icon">💳</span>
                            <strong>নগদ</strong> - মোবাইল ব্যাংকিং
                        </div>
                        <div
                            class="payment-method"
                            onclick="selectPaymentMethod('rocket')">
                            <span class="method-icon">🚀</span>
                            <strong>রকেট</strong> - মোবাইল ব্যাংকিং
                        </div>
                        <div
                            class="payment-method"
                            onclick="selectPaymentMethod('bank')">
                            <span class="method-icon">🏦</span>
                            <strong>ব্যাংক ট্রান্সফার</strong> - অনলাইন ব্যাংকিং
                        </div>
                        <div
                            class="payment-method"
                            onclick="selectPaymentMethod('card')">
                            <span class="method-icon">💳</span>
                            <strong>ক্রেডিট/ডেবিট কার্ড</strong>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="submit-btn">পরিশোধ করুন</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Number Counter Animation
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);

        function updateCounter() {
            start += increment;
            if (start < target) {
                element.textContent = Math.floor(start).toLocaleString();
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        }
        updateCounter();
    }

    // Initialize counters on page load
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll(".stat-number");

        // Start animation after a small delay
        setTimeout(() => {
            counters.forEach((counter) => {
                const target = parseInt(counter.getAttribute("data-target"));
                animateCounter(counter, target);
            });
        }, 500);
    });

    // Tax Calculator Functions
    function calculateTax() {
        const propertyType = document.getElementById("propertyType").value;
        const propertySize =
            parseFloat(document.getElementById("propertySize").value) || 0;
        const pricePerSqft =
            parseFloat(document.getElementById("pricePerSqft").value) || 0;

        let taxRate = 0;
        switch (propertyType) {
            case "residential":
                taxRate = 0.005;
                break;
            case "commercial":
                taxRate = 0.01;
                break;
            case "industrial":
                taxRate = 0.015;
                break;
        }

        const propertyValue = propertySize * pricePerSqft;
        const annualTax = propertyValue * taxRate;

        document.getElementById("calculatedTax").textContent =
            "৳ " + Math.round(annualTax).toLocaleString();
    }

    // Form Functions
    function showPaymentForm(taxType) {
        document.getElementById("tax-selection").style.display = "none";
        document.getElementById("payment-form").style.display = "block";
        document.getElementById("taxType").value = taxType;

        const titles = {
            holding: "হোল্ডিং ট্যাক্স পরিশোধ",
            khajna: "ভূমি খাজনা পরিশোধ",
            business: "ব্যবসায়িক লাইসেন্স ফি পরিশোধ",
            water: "পানি ও স্যানিটেশন ফি পরিশোধ",
            infrastructure: "অবকাঠামো উন্নয়ন ফি পরিশোধ",
            penalty: "জরিমানা ও অন্যান্য ফি পরিশোধ",
        };

        document.getElementById("form-title").textContent =
            titles[taxType] || "কর পরিশোধ";
        updateTaxAmount();
    }

    function showTaxSelection() {
        document.getElementById("payment-form").style.display = "none";
        document.getElementById("tax-selection").style.display = "block";
    }

    function updateTaxAmount() {
        const taxType = document.getElementById("taxType").value;
        const paymentType =
            document.querySelector('select[name="paymentType"]')?.value ||
            "annual";
        const discount = parseFloat(
            document.querySelector('select[name="discount"]')?.value || 0
        );

        // Base tax amounts (example values)
        const baseTaxAmounts = {
            holding: 5000,
            khajna: 1500,
            business: 8000,
            water: 2500,
            infrastructure: 3000,
            penalty: 1000,
        };

        let baseTax = baseTaxAmounts[taxType] || 5000;

        // Adjust for payment type
        if (paymentType === "quarterly") baseTax = baseTax / 4;
        if (paymentType === "monthly") baseTax = baseTax / 12;

        const penalty = Math.random() > 0.7 ? Math.floor(baseTax * 0.1) : 0;
        const discountAmount = Math.floor((baseTax * discount) / 100);
        const totalAmount = baseTax + penalty - discountAmount;

        document.getElementById("baseTax").textContent =
            "৳ " + baseTax.toLocaleString();
        document.getElementById("penalty").textContent =
            "৳ " + penalty.toLocaleString();
        document.getElementById("discount").textContent =
            "৳ " + discountAmount.toLocaleString();
        document.getElementById("totalAmount").textContent =
            "৳ " + totalAmount.toLocaleString();
    }

    function selectPaymentMethod(method) {
        // Remove selected class from all methods
        document.querySelectorAll(".payment-method").forEach((el) => {
            el.classList.remove("selected");
        });

        // Add selected class to clicked method
        event.target.closest(".payment-method").classList.add("selected");
    }

    // Form submission
    document
        .getElementById("taxPaymentForm")
        .addEventListener("submit", function(e) {
            e.preventDefault();

            // Check if payment method is selected
            const selectedMethod = document.querySelector(
                ".payment-method.selected"
            );
            if (!selectedMethod) {
                alert("দয়া করে পরিশোধ পদ্ধতি নির্বাচন করুন।");
                return;
            }

            // Show loading animation
            const submitBtn = document.querySelector(".submit-btn");
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = "প্রক্রিয়াকরণ...";

            // Simulate payment processing
            setTimeout(() => {
                alert("পেমেন্ট সফল হয়েছে! রসিদ আপনার মোবাইলে পাঠানো হবে।");

                // Reset form
                this.reset();
                showTaxSelection();

                // Reset button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }, 3000);
        });
</script>
<!-- </body>

</html> -->
@endsection