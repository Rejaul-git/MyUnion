@extends('layouts.app')
@section('title', 'মৃত্যু সনদপত্রের আবেদন - ইউনিয়ন পরিষদ')

@section('content')
<style>
    body {
        font-family: 'Noto Sans Bengali', Arial, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 0px 0;
    }

    .page-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .back-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateX(-5px);
    }

    .certificate-info {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .certificate-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .certificate-icon-large {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        margin: 0 auto 1rem;
        box-shadow: 0 10px 30px rgba(108, 117, 125, 0.3);
    }

    .info-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 1.5rem;
        border-left: 5px solid #6c757d;
    }

    .info-card h5 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .info-card ul {
        list-style: none;
        padding: 0;
    }

    .info-card li {
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-card li:last-child {
        border-bottom: none;
    }

    .info-card .check-icon {
        color: #28a745;
        font-weight: bold;
    }

    .process-timeline {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .timeline-item {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .timeline-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 25px;
        top: 50px;
        width: 2px;
        height: 40px;
        background: #dee2e6;
    }

    .timeline-number {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 1rem;
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .timeline-content h6 {
        margin: 0 0 0.5rem 0;
        color: #2c3e50;
        font-weight: 600;
    }

    .timeline-content p {
        margin: 0;
        color: #6c757d;
    }

    .application-form {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-section {
        margin-bottom: 2rem;
        border-left: 5px solid #6c757d;
        padding-left: 1.5rem;
    }

    .form-section h4 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .form-label {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .required {
        color: #dc3545;
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
        border-color: #6c757d;
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
    }

    .file-upload-area {
        border: 2px dashed #6c757d;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        background: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-area:hover {
        background: #e9ecef;
        border-color: #495057;
    }

    .file-upload-icon {
        font-size: 3rem;
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        border-radius: 25px;
        padding: 1rem 3rem;
        font-weight: 600;
        color: white;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 25px rgba(40, 167, 69, 0.4);
    }

    .alert-info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border: 1px solid #b8daff;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .cost-info {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border: 1px solid #ffeaa7;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 2rem;
    }

    .cost-amount {
        font-size: 2rem;
        font-weight: 700;
        color: #856404;
        display: block;
    }

    .animate-fade-in {
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

    @media (max-width: 768px) {
        .info-cards {
            grid-template-columns: 1fr;
        }

        .timeline-item {
            flex-direction: column;
            text-align: center;
        }

        .timeline-number {
            margin-bottom: 1rem;
        }
    }
</style>
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <a href="javascript:history.back()" class="back-btn">
            <i class="bi bi-arrow-left"></i> পূর্ববর্তী পেজে ফিরুন
        </a>
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">মৃত্যু সনদপত্রের আবেদন</h1>
                <p class="lead mb-0">মৃত্যু নিবন্ধন এবং মৃত্যু সনদপত্রের জন্য অনলাইন আবেদন করুন</p>
            </div>
            <div class="col-md-4 text-end">
                <div style="font-size: 6rem; opacity: 0.3;">🕊️</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Certificate Information -->
    <div class="certificate-info animate-fade-in">
        <div class="certificate-header">
            <div class="certificate-icon-large">🕊️</div>
            <h2 class="mb-3">মৃত্যু সনদপত্র সম্পর্কে</h2>
            <p class="text-muted">মৃত্যু সনদপত্র একটি গুরুত্বপূর্ণ আইনি দলিল যা সম্পত্তি হস্তান্তর, বীমা দাবি, পেনশন এবং বিভিন্ন সরকারি কাজে প্রয়োজন হয়।</p>
        </div>

        <div class="info-cards">
            <div class="info-card">
                <h5><i class="bi bi-file-text me-2"></i>প্রয়োজনীয় কাগজপত্র</h5>
                <ul>
                    <li><span class="check-icon">✓</span> মৃত ব্যক্তির জন্ম সনদপত্র/NID</li>
                    <li><span class="check-icon">✓</span> চিকিৎসকের প্রত্যয়নপত্র</li>
                    <li><span class="check-icon">✓</span> আবেদনকারীর NID কার্ডের ফটোকপি</li>
                    <li><span class="check-icon">✓</span> পাসপোর্ট সাইজ ছবি (২ কপি)</li>
                    <li><span class="check-icon">✓</span> সাক্ষীদের তথ্য ও স্বাক্ষর</li>
                </ul>
            </div>

            <div class="info-card">
                <h5><i class="bi bi-clock me-2"></i>সেবার তথ্য</h5>
                <ul>
                    <li><span class="check-icon">✓</span> প্রক্রিয়াকরণ সময়: ৭-১৪ কার্যদিবস</li>
                    <li><span class="check-icon">✓</span> অনলাইন যাচাইকরণ সুবিধা</li>
                    <li><span class="check-icon">✓</span> ডিজিটাল কপি ডাউনলোড</li>
                    <li><span class="check-icon">✓</span> SMS এর মাধ্যমে আপডেট</li>
                    <li><span class="check-icon">✓</span> হোম ডেলিভারি সুবিধা</li>
                </ul>
            </div>

            <div class="info-card">
                <h5><i class="bi bi-shield-check me-2"></i>সনদের ব্যবহার</h5>
                <ul>
                    <li><span class="check-icon">✓</span> সম্পত্তি হস্তান্তর</li>
                    <li><span class="check-icon">✓</span> বীমা দাবি নিষ্পত্তি</li>
                    <li><span class="check-icon">✓</span> পেনশন ও অন্যান্য সুবিধা</li>
                    <li><span class="check-icon">✓</span> ব্যাংক অ্যাকাউন্ট বন্ধ</li>
                    <li><span class="check-icon">✓</span> আইনি কার্যক্রম</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cost Information -->
    <div class="cost-info animate-fade-in">
        <h4 class="mb-3"><i class="bi bi-currency-dollar me-2"></i>সেবা ফি</h4>
        <span class="cost-amount">৫০ টাকা</span>
        <p class="mb-0 mt-2">অনলাইন পেমেন্ট অথবা ক্যাশ অন ডেলিভারি</p>
    </div>

    <!-- Process Timeline -->
    <div class="process-timeline animate-fade-in">
        <h3 class="mb-4 text-center"><i class="bi bi-list-ol me-2"></i>আবেদন প্রক্রিয়া</h3>

        <div class="timeline-item">
            <div class="timeline-number">১</div>
            <div class="timeline-content">
                <h6>অনলাইন আবেদন জমা দিন</h6>
                <p>নিচের ফরমটি সঠিকভাবে পূরণ করে প্রয়োজনীয় কাগজপত্র আপলোড করুন</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-number">২</div>
            <div class="timeline-content">
                <h6>ফি প্রদান করুন</h6>
                <p>অনলাইন পেমেন্ট অথবা ক্যাশ অন ডেলিভারি সুবিধা ব্যবহার করুন</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-number">৩</div>
            <div class="timeline-content">
                <h6>যাচাইকরণ প্রক্রিয়া</h6>
                <p>আমাদের টিম আপনার জমা দেওয়া তথ্য ও কাগজপত্র যাচাই করবে</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-number">৪</div>
            <div class="timeline-content">
                <h6>সনদ প্রস্তুতি</h6>
                <p>যাচাইকরণের পর আপনার মৃত্যু সনদপত্র প্রস্তুত করা হবে</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-number">৫</div>
            <div class="timeline-content">
                <h6>সনদ প্রাপ্তি</h6>
                <p>SMS নোটিফিকেশন পেয়ে সনদ সংগ্রহ করুন অথবা হোম ডেলিভারি নিন</p>
            </div>
        </div>
    </div>

    <!-- Application Form -->
    <div class="application-form animate-fade-in">
        <h3 class="text-center mb-4"><i class="bi bi-file-earmark-plus me-2"></i>মৃত্যু সনদপত্রের আবেদন ফরম</h3>

        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            <strong>গুরুত্বপূর্ণ তথ্য:</strong> সকল তথ্য সঠিক এবং যাচাইযোগ্য হতে হবে। ভুল তথ্য প্রদান করলে আবেদন বাতিল হতে পারে।
        </div>
        <form id="deathCertificateForm" action="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Deceased Person Information -->
            <div class="form-section">
                <h4><i class="bi bi-person-x me-2"></i>মৃত ব্যক্তির তথ্য</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পূর্ণ নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" name="deceased_name_bn" class="form-control" placeholder="উদাহরণ: মোহাম্মদ আবদুল করিম" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পূর্ণ নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" name="deceased_name_en" class="form-control" placeholder="Example: Mohammad Abdul Karim" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পিতার নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" name="deceased_father_name_bn" class="form-control" placeholder="পিতার পূর্ণ নাম বাংলায়" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পিতার নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" name="deceased_father_name_en" class="form-control" placeholder="Father's full name in English" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মাতার নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" name="deceased_mother_name_bn" class="form-control" placeholder="মাতার পূর্ণ নাম বাংলায়" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মাতার নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" name="deceased_mother_name_en" class="form-control" placeholder="Mother's full name in English" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">জন্ম তারিখ <span class="required">*</span></label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">মৃত্যুর তারিখ <span class="required">*</span></label>
                        <input type="date" name="date_of_death" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">লিঙ্গ <span class="required">*</span></label>
                        <select name="gender" class="form-select" required>
                            <option value="">লিঙ্গ নির্বাচন করুন</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">মহিলা</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NID নম্বর (যদি থাকে)</label>
                        <input type="text" name="deceased_nid" class="form-control" placeholder="মৃত ব্যক্তির NID নম্বর">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">বয়স (মৃত্যুর সময়) <span class="required">*</span></label>
                        <input type="number" name="age_at_death" class="form-control" placeholder="বছর" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">মৃত্যুর কারণ <span class="required">*</span></label>
                    <input type="text" name="cause_of_death" class="form-control" placeholder="উদাহরণ: হৃদরোগ, বার্ধক্য, দুর্ঘটনা ইত্যাদি" required>
                </div>
            </div>

            <!-- Death Place Information -->
            <div class="form-section">
                <h4><i class="bi bi-geo-alt me-2"></i>মৃত্যুর স্থানের তথ্য</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মৃত্যুর স্থান (হাসপাতাল/বাড়ি) <span class="required">*</span></label>
                        <input type="text" name="death_place" class="form-control" placeholder="উদাহরণ: ঢাকা মেডিকেল কলেজ হাসপাতাল" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">জেলা <span class="required">*</span></label>
                        <select name="district" class="form-select" required>
                            <option value="">জেলা নির্বাচন করুন</option>
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
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">উপজেলা/থানা <span class="required">*</span></label>
                        <select name="upazila" class="form-select" required>
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option value="gazipur">গাজীপুর</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ইউনিয়ন/পৌরসভা <span class="required">*</span></label>
                        <select name="union" class="form-select" required>
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                            <option value="gazipur">গাজীপুর</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Applicant Information -->
            <div class="form-section">
                <h4><i class="bi bi-person me-2"></i>আবেদনকারীর তথ্য</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">আবেদনকারীর নাম <span class="required">*</span></label>
                        <input type="text" name="applicant_name" class="form-control" placeholder="আপনার পূর্ণ নাম" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মৃত ব্যক্তির সাথে সম্পর্ক <span class="required">*</span></label>
                        <select name="relationship" class="form-select" required>
                            <option value="">সম্পর্ক নির্বাচন করুন</option>
                            <option value="son">পুত্র</option>
                            <option value="daughter">কন্যা</option>
                            <option value="spouse">স্বামী/স্ত্রী</option>
                            <option value="brother">ভাই</option>
                            <option value="sister">বোন</option>
                            <option value="father">পিতা</option>
                            <option value="mother">মাতা</option>
                            <option value="other">অন্যান্য</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">আবেদনকারীর NID নম্বর <span class="required">*</span></label>
                        <input type="text" name="applicant_nid" class="form-control" placeholder="১৭ সংখ্যার NID নম্বর" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                        <input type="tel" name="mobile_number" class="form-control" placeholder="01712345678" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">বর্তমান ঠিকানা <span class="required">*</span></label>
                    <textarea name="present_address" class="form-control" rows="3" placeholder="সম্পূর্ণ ঠিকানা লিখুন" required></textarea>
                </div>
            </div>

            <!-- Witness Information -->
            <div class="form-section">
                <h4><i class="bi bi-people me-2"></i>সাক্ষীর তথ্য (২ জন)</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">সাক্ষী ১ এর নাম <span class="required">*</span></label>
                        <input type="text" name="witness1_name" class="form-control" placeholder="প্রথম সাক্ষীর পূর্ণ নাম" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">সাক্ষী ১ এর মোবাইল নম্বর <span class="required">*</span></label>
                        <input type="tel" name="witness1_mobile" class="form-control" placeholder="01712345678" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">সাক্ষী ২ এর নাম <span class="required">*</span></label>
                        <input type="text" name="witness2_name" class="form-control" placeholder="দ্বিতীয় সাক্ষীর পূর্ণ নাম" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">সাক্ষী ২ এর মোবাইল নম্বর <span class="required">*</span></label>
                        <input type="tel" name="witness2_mobile" class="form-control" placeholder="01712345678" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn w-100 btn-submit">আবেদন করুন</button>
        </form>
    </div>
</div>
@endsection