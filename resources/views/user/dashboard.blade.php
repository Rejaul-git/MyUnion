@extends('layouts.app')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Noto Sans Bengali', Arial, sans-serif;
        background-color: #f8f9fa;
        font-size: 14px;
    }

    .sidebar {
        min-height: 100vh;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-right: 2px solid #e9ecef;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar .logo {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        padding: 1.5rem;
        text-align: center;
        font-weight: 600;
        font-size: 1.1rem;
        box-shadow: 0 2px 10px rgba(139, 195, 74, 0.3);
    }

    .sidebar .nav-link {
        color: #495057;
        padding: 1rem 1.5rem;
        border-radius: 0;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        font-weight: 500;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        border-left-color: #689f38;
        transform: translateX(5px);
    }

    .sidebar .nav-link i {
        margin-right: 10px;
        width: 20px;
    }

    .main-content {
        min-height: 100vh;
    }

    .header {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(139, 195, 74, 0.3);
    }

    .profile-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
        overflow: hidden;
    }

    .profile-header {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        padding: 2rem;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 3px solid rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .progress-circle-container {
        position: relative;
        width: 120px;
        height: 120px;
    }

    .progress-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: conic-gradient(#8bc34a 0deg,
                #8bc34a var(--progress),
                #e9ecef var(--progress),
                #e9ecef 360deg);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 0 5px 20px rgba(139, 195, 74, 0.3);
    }

    .progress-circle::before {
        content: '';
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: white;
        position: absolute;
    }

    .progress-text {
        position: relative;
        z-index: 1;
        font-size: 1.5rem;
        font-weight: 700;
        color: #8bc34a;
    }

    .progress-step {
        transition: all 0.3s ease;
        cursor: pointer;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 0.5rem;
    }

    .progress-step:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }

    .step-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 1rem;
        transition: all 0.3s ease;
    }

    .step-completed {
        background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%);
        color: white;
        box-shadow: 0 3px 10px rgba(76, 175, 80, 0.3);
    }

    .step-incomplete {
        background: linear-gradient(135deg, #dee2e6 0%, #ced4da 100%);
        color: #6c757d;
    }

    .alert-custom {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border: 1px solid #ffeaa7;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(255, 193, 7, 0.2);
    }

    .btn-complete {
        background: linear-gradient(135deg, #8e44ad 0%, #7d3c98 100%);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(142, 68, 173, 0.3);
        transition: all 0.3s ease;
    }

    .btn-complete:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(142, 68, 173, 0.4);
    }

    .services-section {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        margin: 0 -15px;
        padding: 2rem 2rem 1rem;
        color: white;
    }

    .search-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 1rem;
        margin-top: 1rem;
    }

    .search-input {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
    }

    .search-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
    }

    .service-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        cursor: pointer;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border-color: #8bc34a;
    }

    .service-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 5px 20px rgba(139, 195, 74, 0.3);
    }

    .service-card h5 {
        color: #343a40;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .service-card p {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .stats-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
        margin-bottom: 1rem;
    }

    .stats-number {
        font-size: 2rem;
        font-weight: 700;
        color: #8bc34a;
        display: block;
    }

    .stats-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .progress-circle-container {
            margin-bottom: 2rem;
        }

        .services-section {
            margin: 0;
            border-radius: 15px;
        }
    }

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

    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .menu-notification {
        position: relative;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 px-0">
            <div class="sidebar">
                <div class="logo">
                    <i class="bi bi-building"></i> ইউনিয়ন পরিষদ
                </div>

                <nav class="nav flex-column">
                    <a class="nav-link active" href="#" data-page="dashboard">
                        <i class="bi bi-house-door"></i> ড্যাশবোর্ড
                    </a>
                    <a class="nav-link" href="#" data-page="profile">
                        <i class="bi bi-person-gear"></i> প্রোফাইল ব্যবস্থাপনা
                    </a>
                    <a class="nav-link" href="#" data-page="certificates">
                        <i class="bi bi-file-earmark-text"></i> সার্টিফিকেট সার্ভিসেস
                    </a>
                    <a class="nav-link menu-notification" href="#" data-page="applications">
                        <i class="bi bi-file-check"></i> আবেদন সমূহ
                        <span class="notification-badge">3</span>
                    </a>
                    <a class="nav-link" href="#" data-page="book">
                        <i class="bi bi-book"></i> জীবন বৃত্তান্ত বই প্রিন্ট
                    </a>
                    <a class="nav-link" href="#" data-page="modernization">
                        <i class="bi bi-arrow-up-circle"></i> জীবন বৃত্তান্ত আধুনিকায়ণ
                    </a>
                    <a class="nav-link menu-notification" href="#" data-page="notifications">
                        <i class="bi bi-bell"></i> নোটিফিকেশন সমূহ
                        <span class="notification-badge">7</span>
                    </a>
                    <a class="nav-link" href="#" data-page="population">
                        <i class="bi bi-people"></i> জনসংখ্যা তালিকা
                    </a>
                    <a class="nav-link" href="#" data-page="contact">
                        <i class="bi bi-telephone"></i> যোগাযোগ
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 px-0">
            <div class="main-content">
                <div class="header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1"><i class="bi bi-speedometer2"></i> ড্যাশবোর্ড</h2>
                            <p class="mb-0 opacity-75">স্বাগতম, আপনার ব্যক্তিগত সেবা পোর্টালে</p>
                        </div>
                        <div class="text-end">
                            <small class="opacity-75">আজ</small>
                            <div id="currentDate"></div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid p-4">
                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="stats-card">
                                <span class="stats-number">12</span>
                                <div class="stats-label">মোট আবেদন</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stats-card">
                                <span class="stats-number text-success">8</span>
                                <div class="stats-label">সম্পূর্ণ</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stats-card">
                                <span class="stats-number text-warning">3</span>
                                <div class="stats-label">প্রক্রিয়াধীন</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stats-card">
                                <span class="stats-number text-danger">1</span>
                                <div class="stats-label">বাতিল</div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="profile-card fade-in">
                                <div class="profile-header">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="profile-avatar">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h3 class="mb-1">মোঃ আবদুল করিম</h3>
                                            <p class="mb-1 opacity-75">সদস্য, ইউনিয়ন পরিষদ</p>
                                            <p class="mb-0 opacity-75">
                                                <i class="bi bi-envelope me-2"></i>abdul.karim@example.com
                                                <i class="bi bi-telephone ms-3 me-2"></i>+880 1712-345678
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <h4 class="mb-3"><i class="bi bi-person-check"></i> প্রোফাইল সম্পূর্ণ করুন</h4>

                                    <div class="alert alert-custom" role="alert">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-exclamation-triangle-fill text-warning me-3 fs-4"></i>
                                            <div>
                                                <strong>প্রয়োজনীয় তথ্য:</strong> সব সার্টিফিকেট সেবা পেতে আপনার প্রোফাইল ১০০% সম্পূর্ণ করুন।
                                                অসম্পূর্ণ প্রোফাইলে আপনি সার্টিফিকেটের জন্য আবেদন করতে পারবেন না।
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center">
                                            <div class="progress-circle-container">
                                                <div class="progress-circle" style="--progress: 216deg;" id="progressCircle">
                                                    <span class="progress-text" id="progressText">60%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <h5 class="mb-3">প্রোফাইল সম্পূর্ণ করার ধাপসমূহ:</h5>
                                            <div class="progress-steps">
                                                <div class="progress-step" onclick="updateStep(this, true)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="step-icon step-completed">
                                                            <i class="bi bi-check"></i>
                                                        </div>
                                                        <span>জাতীয় পরিচয় পত্র নম্বর অথবা জন্ম নিবন্ধন নম্বর</span>
                                                    </div>
                                                </div>
                                                <div class="progress-step" onclick="updateStep(this, true)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="step-icon step-completed">
                                                            <i class="bi bi-check"></i>
                                                        </div>
                                                        <span>জাতীয় পরিচয় পত্র অথবা জন্ম নিবন্ধন এর ছবি কপি</span>
                                                    </div>
                                                </div>
                                                <div class="progress-step" onclick="updateStep(this, false)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="step-icon step-incomplete">3</div>
                                                        <span>বর্তমান ঠিকানা</span>
                                                    </div>
                                                </div>
                                                <div class="progress-step" onclick="updateStep(this, false)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="step-icon step-incomplete">4</div>
                                                        <span>স্থায়ী ঠিকানা</span>
                                                    </div>
                                                </div>
                                                <div class="progress-step" onclick="updateStep(this, false)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="step-icon step-incomplete">5</div>
                                                        <span>পাসপোর্ট সাইজ এর ছবি</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-complete text-white" onclick="completeProfile()">
                                                    <i class="bi bi-check-circle me-2"></i>প্রোফাইল সম্পূর্ণ করুন
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Section -->
                    <div class="services-section rounded fade-in">
                        <h3 class="mb-3">
                            <i class="bi bi-grid-3x3-gap me-2"></i>সেবাসমূহ
                        </h3>

                        <div class="search-container">
                            <div class="input-group">
                                <input type="text" class="form-control search-input" placeholder="সেবাসমূহ খুঁজে দেখুন...">
                                <button class="btn btn-light" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('certificate')">
                                <div class="service-icon">
                                    <i class="bi bi-file-text"></i>
                                </div>
                                <h5>জীবন বৃত্তান্ত তথ্য</h5>
                                <p>জীবন বৃত্তান্ত সংক্রান্ত সকল তথ্য ও সেবা</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('holding')">
                                <div class="service-icon">
                                    <i class="bi bi-house"></i>
                                </div>
                                <h5>হোল্ডিং ট্যাক্স</h5>
                                <p>হোল্ডিং ট্যাক্স পেমেন্ট ও সার্টিফিকেট</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('application')">
                                <div class="service-icon">
                                    <i class="bi bi-person-workspace"></i>
                                </div>
                                <h5>আবেদনের সনদ</h5>
                                <p>বিভিন্ন ধরনের আবেদন ও সনদ সেবা</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('inheritance')">
                                <div class="service-icon">
                                    <i class="bi bi-tree"></i>
                                </div>
                                <h5>কৃষকের অধিকার প্রত্যয়ন</h5>
                                <p>কৃষি জমি ও কৃষকের অধিকার সংক্রান্ত সেবা</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('family')">
                                <div class="service-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h5>পারিবারিক সনদ</h5>
                                <p>পারিবারিক তথ্য ও সনদপত্র সেবা</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-card" onclick="openService('other')">
                                <div class="service-icon">
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                                <h5>অন্যান্য সেবা</h5>
                                <p>আরও বিভিন্ন ধরনের সরকারি সেবা</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    let completedSteps = 2;
    const totalSteps = 5;

    function updateProgress() {
        const percentage = Math.round((completedSteps / totalSteps) * 100);
        const progressDegree = (percentage / 100) * 360;

        document.getElementById('progressText').textContent = percentage + '%';
        document.getElementById('progressCircle').style.setProperty('--progress', progressDegree + 'deg');
    }

    function updateStep(element, isCompleted) {
        const icon = element.querySelector('.step-icon');

        if (isCompleted) {
            if (icon.classList.contains('step-incomplete')) {
                icon.classList.remove('step-incomplete');
                icon.classList.add('step-completed');
                icon.innerHTML = '<i class="bi bi-check"></i>';
                completedSteps++;
                updateProgress();
            }
        } else {
            // Toggle completion for incomplete steps
            if (icon.classList.contains('step-incomplete')) {
                icon.classList.remove('step-incomplete');
                icon.classList.add('step-completed');
                icon.innerHTML = '<i class="bi bi-check"></i>';
                completedSteps++;

                // Show success toast
                showToast('সফল!', 'ধাপটি সম্পূর্ণ হয়েছে', 'success');
            } else {
                icon.classList.remove('step-completed');
                icon.classList.add('step-incomplete');
                const stepNumber = Array.from(element.parentNode.parentNode.children).indexOf(element.parentNode) + 1;
                icon.textContent = stepNumber;
                completedSteps--;
            }
            updateProgress();
        }
    }

    function completeProfile() {
        if (completedSteps === totalSteps) {
            showToast('অভিনন্দন! 🎉', 'আপনার প্রোফাইল ১০০% সম্পূর্ণ হয়েছে!', 'success');
        } else {
            showToast('অসম্পূর্ণ প্রোফাইল', 'অনুগ্রহ করে সকল ধাপ সম্পূর্ণ করুন।', 'warning');
        }
    }

    function openService(serviceType) {
        if (completedSteps !== totalSteps) {
            showToast('প্রোফাইল অসম্পূর্ণ', 'প্রথমে আপনার প্রোফাইল ১০০% সম্পূর্ণ করুন।', 'warning');
            return;
        }

        const services = {
            certificate: 'জীবন বৃত্তান্ত তথ্য সেবা',
            holding: 'হোল্ডিং ট্যাক্স সেবা',
            application: 'আবেদনের সনদ সেবা',
            inheritance: 'কৃষকের অধিকার প্রত্যয়ন সেবা',
            family: 'পারিবারিক সনদ সেবা',
            tax: 'ট্যাক্স পেমেন্ট সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
            complaint: 'অভিযুগ সেবা',
        };

        const service = services[serviceType];
        if (service) {
            window.location.href = '/services/' + serviceType;
        }
    }
</script>
@endsection