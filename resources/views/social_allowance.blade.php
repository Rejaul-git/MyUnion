@extends('layouts.app')
@section('title', 'সামাজিক ভাতা')
@section('content')
<style>
    body {
        font-family: "Hind Siliguri", sans-serif;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .navbar {
        background: linear-gradient(135deg, #2c5530 0%, #4a7c59 100%);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: 700;
        color: white !important;
    }

    .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        margin: 0 10px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ffd700 !important;
        transform: translateY(-2px);
    }

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

    .certificate-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        border-left: 5px solid #4caf50;
    }

    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .certificate-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #4caf50;
    }

    .certificate-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 10px;
    }

    .certificate-description {
        color: #666;
        margin-bottom: 15px;
    }

    .certificate-features {
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

    .apply-btn {
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

    .apply-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        color: white;
    }

    .application-form {
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

    .document-upload {
        border: 2px dashed #e9ecef;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .document-upload:hover {
        border-color: #4caf50;
        background: rgba(76, 175, 80, 0.05);
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

    .help-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-top: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .help-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 15px;
    }

    .help-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 12px;
    }

    .help-icon {
        width: 20px;
        height: 20px;
        background: #4caf50;
        border-radius: 50%;
        margin-right: 12px;
        margin-top: 2px;
        flex-shrink: 0;
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

    @media (max-width: 768px) {
        .header-title {
            font-size: 2rem;
        }

        .certificate-card {
            padding: 20px;
        }

        .application-form {
            padding: 20px;
        }
    }
</style>

<!-- Header Section -->
<section class="header-section">
    <div class="container">
        <h1 class="header-title">সামাজিক ভাতা আবেদন</h1>
        <p class="header-subtitle">বয়স্ক, বিধবা, প্রতিবন্ধী ভাতার জন্য অনলাইনে আবেদন করুন</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-nav justify-content-center">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item"><a href="#">সেবাসমূহ</a></li>
                <li class="breadcrumb-item active">সামাজিক ভাতা আবেদন</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="main-content">
    <div class="container">
        <!-- Allowance Selection -->
        <div id="allowance-selection">
            <div class="alert alert-info">
                <strong>📋 নির্দেশনা:</strong> আপনার প্রয়োজনীয় সামাজিক ভাতার ধরন নির্বাচন করুন এবং আবেদনের জন্য ক্লিক করুন।
            </div>

            <div class="row">
                <!-- বয়স্ক ভাতা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('elderly')">
                        <div class="certificate-icon">👴</div>
                        <h3 class="certificate-title">বয়স্ক ভাতা</h3>
                        <p class="certificate-description">
                            ৬৫ বছর বা তার অধিক বয়সী দুস্থ ব্যক্তিদের জন্য মাসিক ভাতার ব্যবস্থা। সামাজিক নিরাপত্তার অংশ হিসেবে প্রদান করা হয়।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক ৬০০ টাকা ভাতা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বয়স ৬৫ বছর বা তার বেশি</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>প্রতি ৩ মাসে একবার প্রদান</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>

                <!-- বিধবা ভাতা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('widow')">
                        <div class="certificate-icon">👩</div>
                        <h3 class="certificate-title">বিধবা ভাতা</h3>
                        <p class="certificate-description">
                            স্বামী মৃত্যুর পর দুস্থ বিধবা মহিলাদের জন্য মাসিক ভাতা। আর্থিক সহায়তার মাধ্যমে জীবনযাত্রার মান উন্নয়ন।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক ৬০০ টাকা ভাতা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>স্বামীর মৃত্যু সনদ প্রয়োজন</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বয়স ১৮-৬৫ বছরের মধ্যে</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>

                <!-- প্রতিবন্ধী ভাতা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('disabled')">
                        <div class="certificate-icon">♿</div>
                        <h3 class="certificate-title">প্রতিবন্ধী ভাতা</h3>
                        <p class="certificate-description">
                            শারীরিক বা মানসিক প্রতিবন্ধী ব্যক্তিদের জন্য মাসিক ভাতা। সামাজিক অন্তর্ভুক্তি ও আর্থিক সহায়তা প্রদান।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক ৮০০ টাকা ভাতা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>চিকিৎসক প্রত্যয়ন পত্র প্রয়োজন</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>সকল বয়সের জন্য প্রযোজ্য</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>

                <!-- মাতৃত্বকালীন ভাতা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('maternity')">
                        <div class="certificate-icon">🤱</div>
                        <h3 class="certificate-title">মাতৃত্বকালীন ভাতা</h3>
                        <p class="certificate-description">
                            গর্ভবতী ও নতুন মায়েদের জন্য বিশেষ ভাতা। মা ও শিশুর স্বাস্থ্য সুরক্ষা এবং পুষ্টি নিশ্চিতকরণের জন্য।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক ৮০০ টাকা ভাতা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>গর্ভাবস্থা থেকে ২ বছর পর্যন্ত</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>চিকিৎসা সেবা ও পরামর্শ</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>

                <!-- শিক্ষা উপবৃত্তি -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('education')">
                        <div class="certificate-icon">📚</div>
                        <h3 class="certificate-title">শিক্ষা উপবৃত্তি</h3>
                        <p class="certificate-description">
                            দরিদ্র পরিবারের মেধাবী শিক্ষার্থীদের জন্য শিক্ষা উপবৃত্তি। শিক্ষার অধিকার নিশ্চিত করতে আর্থিক সহায়তা।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>শ্রেণি অনুযায়ী ভাতার পরিমাণ</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>নূন্যতম ৭৫% উপস্থিতি প্রয়োজন</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>বার্ষিক ভিত্তিতে মূল্যায়ন</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>

                <!-- কৃষক ভাতা -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="certificate-card" onclick="showApplicationForm('farmer')">
                        <div class="certificate-icon">🧑‍🌾</div>
                        <h3 class="certificate-title">কৃষক ভাতা</h3>
                        <p class="certificate-description">
                            ক্ষুদ্র ও প্রান্তিক কৃষকদের জন্য বিশেষ ভাতা। কৃষি উৎপাদন বৃদ্ধি ও কৃষকদের আর্থিক নিরাপত্তা নিশ্চিতকরণ।
                        </p>
                        <div class="certificate-features">
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>মাসিক ৫০০ টাকা ভাতা</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>জমির দলিল যাচাই প্রয়োজন</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon"></div>
                                <span>কৃষি বীমা সুবিধা</span>
                            </div>
                        </div>
                        <a href="#" class="apply-btn">আবেদন করুন</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Form (Hidden by default) -->
        <div id="application-form" class="application-form">
            <button class="back-btn" onclick="showAllowanceSelection()">← ফিরে যান</button>

            <div class="form-title" id="form-title">সামাজিক ভাতার আবেদন</div>

            <form id="allowanceForm">
                <input type="hidden" id="allowanceType" name="allowanceType" value="">

                <!-- Personal Information -->
                <div class="form-section">
                    <h4 class="section-title">ব্যক্তিগত তথ্য</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">পূর্ণ নাম (বাংলায়) <span class="required">*</span></label>
                            <input type="text" class="form-control" name="fullNameBn" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">পূর্ণ নাম (ইংরেজিতে) <span class="required">*</span></label>
                            <input type="text" class="form-control" name="fullNameEn" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">পিতার নাম <span class="required">*</span></label>
                            <input type="text" class="form-control" name="fatherName" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">মাতার নাম <span class="required">*</span></label>
                            <input type="text" class="form-control" name="motherName" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">লিঙ্গ <span class="required">*</span></label>
                            <select class="form-select" name="gender" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="male">পুরুষ</option>
                                <option value="female">মহিলা</option>
                                <option value="other">অন্যান্য</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">জন্ম তারিখ <span class="required">*</span></label>
                            <input type="date" class="form-control" name="dateOfBirth" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">বর্তমান বয়স</label>
                            <input type="number" class="form-control" name="currentAge" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">জাতীয় পরিচয়পত্র নম্বর <span class="required">*</span></label>
                            <input type="text" class="form-control" name="nidNumber" maxlength="17" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                            <input type="tel" class="form-control" name="mobileNumber" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">বৈবাহিক অবস্থা <span class="required">*</span></label>
                            <select class="form-select" name="maritalStatus" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="married">বিবাহিত</option>
                                <option value="unmarried">অবিবাহিত</option>
                                <option value="widow">বিধবা</option>
                                <option value="divorced">তালাকপ্রাপ্ত</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="form-section">
                    <h4 class="section-title">ঠিকানা</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">বর্তমান ঠিকানা <span class="required">*</span></label>
                            <textarea class="form-control" name="currentAddress" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">বিভাগ <span class="required">*</span></label>
                            <select class="form-select" name="division" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="dhaka">ঢাকা</option>
                                <option value="chittagong">চট্টগ্রাম</option>
                                <option value="rajshahi">রাজশাহী</option>
                                <option value="khulna">খুলনা</option>
                                <option value="barisal">বরিশাল</option>
                                <option value="sylhet">সিলেট</option>
                                <option value="rangpur">রংপুর</option>
                                <option value="mymensingh">ময়মনসিংহ</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">জেলা <span class="required">*</span></label>
                            <select class="form-select" name="district" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="mymensingh">ময়মনসিংহ</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">উপজেলা <span class="required">*</span></label>
                            <select class="form-select" name="upazila" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="phulpur">ফুলপুর</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">ইউনিয়ন <span class="required">*</span></label>
                            <select class="form-select" name="union" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="phulpur">ফুলপুর</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Additional Information -->
                <div class="form-section">
                    <h4 class="section-title">অতিরিক্ত তথ্য</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">শিক্ষাগত যোগ্যতা <span class="required">*</span></label>
                            <select class="form-select" name="educationLevel" required></select>
                            <option value="">নির্বাচন করুন</option>
                            <option value="no_education">শিক্ষা নেই</option>
                            <option value="primary">প্রাথমিক</option>
                            <option value="secondary">মাধ্যমিক</option>
                            <option value="higher_secondary">উচ্চ মাধ্যমিক</option>
                            <option value="graduate">স্নাতক</option>
                            <option value="post_graduate">স্নাতকোত্তর</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">বৈবাহিক অবস্থা <span class="required">*</span></label>
                            <select class="form-select" name="maritalStatus" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="married">বিবাহিত</option>
                                <option value="unmarried">অবিবাহিত</option>
                                <option value="widow">বিধবা</option>
                                <option value="divorced">তালাকপ্রাপ্ত</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Document Upload -->
                <div class="form-section">
                    <h4 class="section-title">প্রয়োজনীয় কাগজপত্র আপলোড করুন</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">জাতীয় পরিচয়পত্র (NID) <span class="required">*</span></label>
                            <div class="document-upload" onclick="document.getElementById('nidUpload').click()">
                                <input type="file" id="nidUpload" name="nidUpload" accept=".jpg,.jpeg,.png,.pdf" style="display:none" required>
                                <span>ক্লিক করুন বা ড্র্যাগ করুন ফাইল আপলোড করতে</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">জন্ম নিবন্ধন পত্র <span class="required">*</span></label>
                            <div class="document-upload" onclick="document.getElementById('birthCertificate').click()">
                                <input type="file" id="birthCertificate" name="birthCertificate" accept=".jpg,.jpeg,.png,.pdf" style="display:none" required>
                                <span>ক্লিক করুন বা ড্র্যাগ করুন ফাইল আপলোড করতে</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="text-center"></div>
                <button type="submit" class="submit-btn">আবেদন জমা দিন</button>
        </div>
        </form>
    </div>
    <!-- script -->
    <script>
        // JavaScript code for form validation and interactivity
        function showApplicationForm(type) {
            document.getElementById('applicationForm').style.display = 'block';
            document.getElementById('applicationType').value = type;
        }

        function showAllowanceSelection() {
            document.getElementById('applicationForm').style.display = 'none';
            document.getElementById('applicationType').value = '';
        }
        document.getElementById('dateOfBirth').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementsByName('currentAge')[0].value = age;
        });
        document.getElementById('allowanceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('আপনার আবেদন সফলভাবে জমা হয়েছে!');
            this.reset();
            showAllowanceSelection();
        });
    </script>

</section>
@endsection