@extends('layouts.app')

@section('content')


<style>
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    } */

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
</head>

<body>

    <!-- Header Section -->
    <section class="header-section">

        <div class="container">
            <h1 class="header-title">সনদপত্র আবেদন</h1>
            <p class="header-subtitle">জন্ম, মৃত্যু, বিবাহ এবং অন্যান্য সনদপত্রের জন্য অনলাইনে আবেদন করুন</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-nav justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">হোম</a></li>
                    <li class="breadcrumb-item"><a href="#services">সেবাসমূহ</a></li>
                    <li class="breadcrumb-item active">সনদপত্র আবেদন</li>
                </ol>
            </nav>
        </div>

    </section>
    <!DOCTYPE html>
    <html lang="bn">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>সনদপত্র আবেদন | স্মার্ট নাগরিক সেবা</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    🏛️ স্মার্ট নাগরিক সেবা
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">হোম</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">সেবাসমূহ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">যোগাযোগ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Main Content -->
        <section class="main-content">
            <div class="container">
                <!-- Certificate Selection -->
                <div id="certificate-selection">
                    <div class="alert alert-info">
                        <strong>📋 নির্দেশনা:</strong> আপনার প্রয়োজনীয় সনদপত্রের ধরন নির্বাচন করুন এবং আবেদনের জন্য ক্লিক করুন।
                    </div>

                    <div class="row">
                        <!-- জন্ম সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('birth')">
                                <div class="certificate-icon">👶</div>
                                <h3 class="certificate-title">জন্ম সনদপত্র</h3>
                                <p class="certificate-description">
                                    জন্ম নিবন্ধন এবং জন্ম সনদপত্রের জন্য আবেদন করুন। এটি শিক্ষা প্রতিষ্ঠানে ভর্তি এবং পাসপোর্ট তৈরির জন্য প্রয়োজন।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>অনলাইন যাচাইকরণ সুবিধা</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>দ্রুত প্রক্রিয়াকরণ (৭-১৪ দিন)</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>ডিজিটাল কপি ডাউনলোড</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>

                        <!-- মৃত্যু সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('death')">
                                <div class="certificate-icon">🕊️</div>
                                <h3 class="certificate-title">মৃত্যু সনদপত্র</h3>
                                <p class="certificate-description">
                                    মৃত্যু নিবন্ধন এবং মৃত্যু সনদপত্রের জন্য আবেদন করুন। সম্পত্তি হস্তান্তর এবং আইনি কার্যক্রমের জন্য প্রয়োজনীয়।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>হাসপাতাল/ডাক্তারের সার্টিফিকেট প্রয়োজন</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>আত্মীয়দের তথ্য যাচাই</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>দ্রুত প্রক্রিয়াকরণ (৫-১০ দিন)</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>

                        <!-- বিবাহ সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('marriage')">
                                <div class="certificate-icon">💒</div>
                                <h3 class="certificate-title">বিবাহ সনদপত্র</h3>
                                <p class="certificate-description">
                                    বিবাহ নিবন্ধন এবং বিবাহ সনদপত্রের জন্য আবেদন করুন। পারিবারিক এবং আইনি কার্যক্রমের জন্য অপরিহার্য।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>স্বামী-স্ত্রী উভয়ের তথ্য প্রয়োজন</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>সাক্ষীদের তথ্য এবং স্বাক্ষর</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>কাজী/রেজিস্ট্রারের অনুমোদন</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>

                        <!-- চারিত্রিক সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('character')">
                                <div class="certificate-icon">📄</div>
                                <h3 class="certificate-title">চারিত্রিক সনদপত্র</h3>
                                <p class="certificate-description">
                                    চারিত্রিক সনদপত্রের জন্য আবেদন করুন। চাকরি, ভিসা এবং বিভিন্ন আইনি কার্যক্রমের জন্য প্রয়োজনীয়।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>পুলিশ যাচাইকরণ প্রয়োজন</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>স্থানীয় জনপ্রতিনিধির সুপারিশ</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>প্রক্রিয়াকরণ সময় (১৫-৩০ দিন)</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>

                        <!-- বয়স সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('age')">
                                <div class="certificate-icon">📅</div>
                                <h3 class="certificate-title">বয়স সনদপত্র</h3>
                                <p class="certificate-description">
                                    বয়স প্রমাণের জন্য সনদপত্র আবেদন করুন। সরকারি চাকরি, পেনশন এবং বিভিন্ন সুবিধার জন্য প্রয়োজনীয়।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>শিক্ষা সংক্রান্ত দলিল যাচাই</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>চিকিৎসা পরীক্ষা (প্রয়োজনে)</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>দ্রুত প্রক্রিয়াকরণ (৭-১৪ দিন)</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>

                        <!-- আয় সনদপত্র -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="certificate-card" onclick="showApplicationForm('income')">
                                <div class="certificate-icon">💰</div>
                                <h3 class="certificate-title">আয় সনদপত্র</h3>
                                <p class="certificate-description">
                                    আয়ের পরিমাণ প্রমাণের জন্য সনদপত্র। বৃত্তি, ঋণ এবং বিভিন্ন সরকারি সুবিধার জন্য প্রয়োজনীয়।
                                </p>
                                <div class="certificate-features">
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>আয়ের উৎস যাচাইকরণ</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>ব্যাংক স্টেটমেন্ট প্রয়োজন</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon"></div>
                                        <span>প্রক্রিয়াকরণ সময় (১০-২০ দিন)</span>
                                    </div>
                                </div>
                                <a href="#" class="apply-btn">আবেদন করুন</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Form (Hidden by default) -->
                <div id="application-form" class="application-form">
                    <button class="back-btn" onclick="showCertificateSelection()">← ফিরে যান</button>

                    <div class="form-title" id="form-title">সনদপত্রের আবেদন</div>

                    <form id="certificateForm">
                        <input type="hidden" id="certificateType" name="certificateType" value="">

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
                                    <label class="form-label">জন্মস্থান</label>
                                    <input type="text" class="form-control" name="placeOfBirth">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">জাতীয় পরিচয়পত্র নম্বর</label>
                                    <input type="text" class="form-control" name="nidNumber" maxlength="17">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                                    <input type="tel" class="form-control" name="mobileNumber" required>
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
                                <div class="col-md-4 mb-3">
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
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">জেলা <span class="required">*</span></label>
                                    <select class="form-select" name="district" required>
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="mymensingh">ময়মনসিংহ</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">উপজেলা <span class="required">*</span></label>
                                    <select class="form-select" name="upazila" required>
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="phulpur">ফুলপুর</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Document Upload -->
                        <div class="form-section">
                            <h4 class="section-title">প্রয়োজনীয় কাগজপত্র</h4>

                            <div class="row" id="document-section">
                                <!-- Documents will be loaded based on certificate type -->
                            </div>
                        </div>

                        <!-- Additional Information (specific to certificate type) -->
                        <div class="form-section" id="additional-info">
                            <h4 class="section-title">অতিরিক্ত তথ্য</h4>
                            <div id="additional-fields">
                                <!-- Additional fields will be loaded based on certificate type -->
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">




                            <!-- Footer -->
                            <footer class="footer">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4 mb-lg-0">
                                            <h4 class="text-white mb-4">Smart Nagorik</h4>
                                            <p>Your one-stop platform for all municipal services in Bangladesh. We're committed to making government services accessible to all citizens.</p>
                                            <div class="social-icons mt-4">
                                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                                            <h5 class="text-white mb-4">Quick Links</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><a href="#" class="text-decoration-none text-light">Home</a></li>
                                                <li class="mb-2"><a href="#" class="text-decoration-none text-light">Services</a></li>
                                                <li class="mb-2"><a href="#" class="text-decoration-none text-light">Applications</a></li>
                                                <li class="mb-2"><a href="#" class="text-decoration-none text-light">Marketplace</a></li>
                                                <li class="mb-2"><a href="#" class="text-decoration-none text-light">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                                            <h5 class="text-white mb-4">Contact Info</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Municipal Office, City Center</li>
                                                <li class="mb-2"><i class="fas fa-phone me-2"></i> +880 XXXXXXXXXX</li>
                                                <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@smartnagorik.gov.bd</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <h5 class="text-white mb-4">Download Our App</h5>
                                            <div class="d-flex flex-column">
                                                <button class="btn btn-outline-light mb-2">
                                                    <i class="fab fa-google-play me-2"></i> Google Play
                                                </button>
                                                <button class="btn btn-outline-light">
                                                    <i class="fab fa-apple me-2"></i> App Store
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 text-center text-md-start">
                                            <p class="mb-0">&copy; 2023 Smart Nagorik. All rights reserved.</p>
                                        </div>
                                        <div class="col-md-6 text-center text-md-end">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a href="#" class="text-decoration-none text-light">Privacy Policy</a></li>
                                                <li class="list-inline-item"><a href="#" class="text-decoration-none text-light">Terms of Service</a></li>
                                                <li class="list-inline-item"><a href="#" class="text-decoration-none text-light">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </footer>

                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                        </div>
                </div>
            </div>
            @endsection