@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 1200px;
    }

    .registration-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .header-section {
        background: linear-gradient(135deg, #4caf50, #45a049);
        color: white;
        text-align: center;
        padding: 25px;
        position: relative;
    }

    .header-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    }

    .header-section h4 {
        position: relative;
        z-index: 1;
        font-size: 28px;
        font-weight: bold;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .header-icon {
        font-size: 40px;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .nav-tabs {
        border-bottom: none;
        background: #f8f9fa;
        padding: 15px 15px 0;
    }

    .nav-tabs .nav-link {
        background: linear-gradient(135deg, #6c757d, #5a6268);
        color: white;
        border: none;
        border-radius: 12px 12px 0 0;
        margin-right: 5px;
        padding: 12px 20px;
        font-weight: bold;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-tabs .nav-link:hover {
        background: linear-gradient(135deg, #28a745, #20c997);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .nav-tabs .nav-link.active {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }

    .form-section {
        padding: 30px;
        background: white;
    }

    .form-label {
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .required::after {
        content: " *";
        color: #dc3545;
        font-weight: bold;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .btn-success {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        border-radius: 15px;
        padding: 15px 30px;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #20c997, #17a2b8);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(40, 167, 69, 0.4);
    }

    .btn-success::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-success:active::before {
        width: 300px;
        height: 300px;
    }

    .form-check-input {
        width: 20px;
        height: 20px;
        margin-top: 0.1em;
    }

    .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }

    .form-check-label {
        margin-left: 10px;
        color: #666;
        line-height: 1.5;
    }

    /* Notice Panel Styles */
    .notice-panel {
        background: linear-gradient(135deg, #17a2b8, #20c997);
        color: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(23, 162, 184, 0.3);
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
    }

    .notice-panel::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle,
                rgba(255, 255, 255, 0.1) 0%,
                transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .notice-panel h5 {
        font-weight: bold;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .notice-panel ul {
        list-style: none;
        padding: 0;
        position: relative;
        z-index: 1;
    }

    .notice-panel li {
        margin-bottom: 12px;
        padding-left: 30px;
        position: relative;
        line-height: 1.6;
    }

    .notice-panel li::before {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #ffd700;
        font-size: 16px;
    }

    .star-required::before {
        content: "\f005";
        color: #ff6b6b;
    }

    .criteria-panel {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        color: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(255, 107, 107, 0.3);
        position: relative;
        overflow: hidden;
    }

    .criteria-panel::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle,
                rgba(255, 255, 255, 0.1) 0%,
                transparent 70%);
        animation: rotate 15s linear infinite reverse;
    }

    .criteria-panel h5 {
        position: relative;
        z-index: 1;
        margin-bottom: 20px;
    }

    .criteria-panel ul {
        position: relative;
        z-index: 1;
        list-style: none;
        padding: 0;
    }

    .criteria-panel li {
        margin-bottom: 12px;
        padding-left: 30px;
        position: relative;
        line-height: 1.6;
    }

    .criteria-panel li::before {
        content: "\f06a";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #ffd700;
        font-size: 16px;
    }

    /* Animation Effects */
    .fade-in {
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

    .bounce-in {
        animation: bounceIn 0.6s ease-out;
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0.3);
            opacity: 0;
        }

        50% {
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        .form-section {
            padding: 20px;
        }

        .nav-tabs .nav-link {
            padding: 10px 12px;
            font-size: 14px;
        }

        .header-section h4 {
            font-size: 24px;
        }

        .notice-panel,
        .criteria-panel {
            padding: 20px;
        }
    }

    /* Input Icons */
    .input-group-text {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        border-radius: 10px 0 0 10px;
    }

    .input-icon {
        position: relative;
    }

    .input-icon .form-control {
        padding-left: 45px;
    }

    .input-icon::before {
        content: attr(data-icon);
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 10;
        pointer-events: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="registration-card fade-in">
                <div class="header-section">
                    <div class="header-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4>নাগরিক অ্যাকাউন্ট তৈরি করুন</h4>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs" id="registrationTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="birth-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#birth"
                            type="button"
                            role="tab">
                            <i class="fas fa-baby me-2"></i>জন্ম নিবন্ধনের মাধ্যমে
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="nid-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nid"
                            type="button"
                            role="tab">
                            <i class="fas fa-id-card me-2"></i>জাতীয় পরিচয়পত্রের মাধ্যমে
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="general-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#general"
                            type="button"
                            role="tab">
                            <i class="fas fa-user-edit me-2"></i>সাধারণ নিবন্ধন
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content form-section" id="registrationTabsContent">
                    <!-- জন্ম নিবন্ধনের মাধ্যমে -->
                    <div class="tab-pane fade show active" id="birth" role="tabpanel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class=" mb-3">
                                <label class="form-label required">পূর্ণ নাম</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="আপনার পূর্ণ নাম লিখুন" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">জন্ম নিবন্ধন নম্বর</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="birth_num"
                                        class="form-control"
                                        placeholder="আপনার জন্ম নিবন্ধন নম্বর দিন" />
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label required">জন্ম তারিখ</label>
                                <input type="date" name="date_of_birth" class="form-control" />
                            </div>


                            <div class="mb-3">
                                <label class="form-label required">মোবাইল নম্বর</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="১১ ডিজিটের মোবাইল নম্বর" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ইমেইল ঠিকানা</label>
                                <div class="input-icon">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="আপনার ইমেইল ঠিকানা (ঐচ্ছিক)" />
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="policy"
                                    id="policy1" />
                                <label class="form-check-label" for="policy1">
                                    আমি প্রযুক্তি সিস্টেমের তথ্য অ্যাপ্লিকেশন নীতিমালা সাথে
                                    একমত
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success w-100 bounce-in">
                                <i class="fas fa-user-check me-2"></i>নিবন্ধন করুন
                            </button>
                        </form>
                    </div>

                    <!-- জাতীয় পরিচয়পত্রের মাধ্যমে -->
                    <div class="tab-pane fade" id="nid" role="tabpanel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class=" mb-3">
                                <label class="form-label required">পূর্ণ নাম</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="আপনার পূর্ণ নাম লিখুন" />
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label required">জাতীয় পরিচয়পত্র নম্বর</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nid"
                                        placeholder="আপনার এনআইডি নম্বর দিন" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">জন্ম তারিখ</label>
                                <input type="date" name="date_of_birth" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">মোবাইল নম্বর</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="১১ ডিজিটের মোবাইল নম্বর" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ইমেইল ঠিকানা</label>
                                <div class="input-icon">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="আপনার ইমেইল ঠিকানা (ঐচ্ছিক)" />
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="policy"
                                    id="policy2" />
                                <label class="form-check-label" for="policy2">
                                    আমি প্রযুক্তি সিস্টেমের তথ্য অ্যাপ্লিকেশন নীতিমালা সাথে
                                    একমত
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-user-check me-2"></i>নিবন্ধন করুন
                            </button>
                        </form>
                    </div>

                    <!-- সাধারণ নিবন্ধন -->
                    <div class="tab-pane fade" id="general" role="tabpanel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class=" mb-3">
                                <label class="form-label required">পূর্ণ নাম</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="আপনার পূর্ণ নাম লিখুন" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">ইমেইল ঠিকানা</label>
                                <div class="input-icon">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="ইমেইল দিন" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">মোবাইল নম্বর</label>
                                <div class="input-icon">
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="১১ ডিজিটের মোবাইল নম্বর" />
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="policy"
                                    id="policy3" />
                                <label class="form-check-label" for="policy3">
                                    আমি প্রযুক্তি সিস্টেমের তথ্য অ্যাপ্লিকেশন নীতিমালা সাথে
                                    একমত
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-user-check me-2"></i>নিবন্ধন করুন
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notice Panel -->
        <div class="col-lg-4 mt-4">
            <div class="notice-panel bounce-in">
                <h5><i class="fas fa-info-circle me-2"></i>নিবন্ধন নির্দেশনা</h5>
                <ul>
                    <li class="star-required">
                        (*) চিহ্নিত ক্ষেত্রগুলো পূরণ করা বাধ্যতামূলক
                    </li>
                    <li>সঠিক ও বৈধ তথ্য প্রদান করুন</li>
                    <li>মোবাইল নম্বরে যাচাইকরণ কোড পাঠানো হবে</li>
                    <li>ইমেইল ঠিকানা দিলে নিবন্ধন সহজ হবে</li>
                    <li>জন্ম তারিখ সঠিকভাবে নির্বাচন করুন</li>
                    <li>নীতিমালা সম্মত হওয়া আবশ্যক</li>
                </ul>
            </div>

            <div class="criteria-panel">
                <h5><i class="fas fa-tasks me-2"></i>নাগরিক সেবা পেতে</h5>
                <ul>
                    <li>প্রোফাইল ১০০% সম্পূর্ণ করতে হবে</li>
                    <li>পরিচয়পত্র যাচাই করাতে হবে</li>
                    <li>মোবাইল নম্বর ভেরিফাই করতে হবে</li>
                    <li>সব তথ্য আপডেট রাখতে হবে</li>
                    <li>নিয়মিত লগইন করতে হবে</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

</script>
@endsection