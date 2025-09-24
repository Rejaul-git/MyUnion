@extends('layouts.user')
@section('title', 'আপনার প্রোফাইল সম্পূর্ণ করুন')
@section('content')
<style>
    body {
        font-family: 'Noto Sans Bengali', Arial, sans-serif;
        background: linear-gradient(135deg, #ffffffff 0%, #ffffffff 100%);
        min-height: 100vh;
    }

    .page-header {
        background: linear-gradient(135deg, #8bc34a 0%, #8bc34a 100%);
        color: white;
        padding: 3rem 0;
        margin-bottom: 3rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 100%;
        height: 200%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
        animation: float 20s linear infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px) rotate(0deg);
        }

        100% {
            transform: translateY(-100px) rotate(360deg);
        }
    }

    .service-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .service-card:hover::before {
        left: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        position: relative;
        z-index: 2;
    }

    .birth-certificate .service-icon {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
    }

    .death-certificate .service-icon {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        box-shadow: 0 10px 30px rgba(116, 185, 255, 0.3);
    }

    .marriage-certificate .service-icon {
        background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);
        box-shadow: 0 10px 30px rgba(253, 121, 168, 0.3);
    }

    .citizenship-certificate .service-icon {
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
        box-shadow: 0 10px 30px rgba(0, 184, 148, 0.3);
    }

    .character-certificate .service-icon {
        background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        box-shadow: 0 10px 30px rgba(253, 203, 110, 0.3);
    }

    .income-certificate .service-icon {
        background: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
        box-shadow: 0 10px 30px rgba(162, 155, 254, 0.3);
    }

    .btn-apply {
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
        border: none;
        border-radius: 25px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0, 184, 148, 0.3);
        width: 100%;
    }

    .btn-apply:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 184, 148, 0.4);
        color: white;
    }

    .btn-details {
        background: transparent;
        border: 2px solid #6c757d;
        border-radius: 25px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        color: #6c757d;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 0.5rem;
    }

    .btn-details:hover {
        background: #6c757d;
        color: white;
        transform: translateY(-2px);
    }

    .service-stats {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
        border-radius: 15px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .recent-applications {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .application-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 5px solid #00b894;
        transition: all 0.3s ease;
    }

    .application-item:hover {
        transform: translateX(10px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .status-pending {
        background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-processing {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-completed {
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .info-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .process-timeline {
        position: relative;
        padding-left: 2rem;
    }

    .process-timeline::before {
        content: '';
        position: absolute;
        left: 1rem;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .process-step {
        position: relative;
        margin-bottom: 2rem;
        padding-left: 2rem;
    }

    .process-step::before {
        content: '';
        position: absolute;
        left: -2.5rem;
        top: 0.5rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 0 0 4px white, 0 0 0 6px #667eea;
    }

    .quick-links {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        border-radius: 20px;
        padding: 2rem;
        color: white;
        margin-bottom: 3rem;
    }

    .quick-link-item {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-link-item:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateX(10px);
    }

    .floating-help {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(255, 107, 107, 0.4);
        transition: all 0.3s ease;
        z-index: 1000;
        animation: pulse 2s infinite;
    }

    .floating-help:hover {
        transform: scale(1.1);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(255, 107, 107, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(255, 107, 107, 0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .breadcrumb-custom {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        backdrop-filter: blur(10px);
    }

    .breadcrumb-custom a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .breadcrumb-custom a:hover {
        color: white;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .service-card {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            font-size: 2rem;
        }

        .floating-help {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }
</style>
</head>

<body>
    <!-- Floating Help Button -->
    <div class="floating-help" data-bs-toggle="modal" data-bs-target="#helpModal" title="সাহায্য প্রয়োজন?">
        <i class="bi bi-question-lg"></i>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb breadcrumb-custom mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house me-1"></i>হোম</a></li>
                    <li class="breadcrumb-item"><a href="#">সেবা সমূহ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">সার্টিফিকেট সার্ভিসেস</li>
                </ol>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="bi bi-award me-3"></i>সার্টিফিকেট সার্ভিসেস
                    </h1>
                    <p class="lead mb-0">
                        ইউনিয়ন পরিষদের সকল ধরনের সার্টিফিকেট এবং প্রত্যয়নপত্রের জন্য অনলাইন আবেদন করুন।
                        দ্রুত, সহজ এবং নিরাপদ সেবা।
                    </p>
                </div>
                <div class="col-lg-4 text-center">
                    <div style="font-size: 8rem; opacity: 0.3;">🏆</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Service Statistics -->
        <div class="service-stats animate-fade-in">
            <h3 class="text-center mb-4">
                <i class="bi bi-bar-chart-line me-2"></i>সেবার পরিসংখ্যান
            </h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">১,২৫০</div>
                        <h6 class="mt-2 mb-0">মোট আবেদন</h6>
                        <small class="text-muted">এই মাসে</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">৯৮৫</div>
                        <h6 class="mt-2 mb-0">সম্পূর্ণ হয়েছে</h6>
                        <small class="text-muted">সফল আবেদন</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">৭</div>
                        <h6 class="mt-2 mb-0">গড় সময়</h6>
                        <small class="text-muted">কার্যদিবস</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">৯৮%</div>
                        <h6 class="mt-2 mb-0">সন্তুষ্টির হার</h6>
                        <small class="text-muted">গ্রাহক পর্যালোচনা</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certificate Services Grid -->
        <div class="row">
            <!-- Birth Certificate -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card birth-certificate animate-fade-in">
                    <div class="text-center">
                        <div class="service-icon">👶</div>
                        <h4 class="mb-3">জন্ম সনদপত্র</h4>
                        <p class="text-muted mb-4">
                            জন্ম নিবন্ধন এবং জন্ম সনদপত্রের জন্য আবেদন করুন।
                            শিক্ষা, চাকরি এবং পাসপোর্টের জন্য প্রয়োজনীয়।
                        </p>

                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">সেবা ফি</small>
                                    <strong class="text-success">৫০ টাকা</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">সময়</small>
                                    <strong class="text-primary">৭-১৪ দিন</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">রেটিং</small>
                                    <strong class="text-warning">★★★★★</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('birthcertificate') }}">
                                <button class="btn btn-apply" onclick="applyForCertificate('birth')">
                                    <i class="bi bi-plus-circle me-2"></i>এখনই আবেদন করুন
                                </button>
                            </a>
                            <a href="{{ route('birthcertificate') }}">
                                <button class="btn btn-details" data-bs-toggle="modal" data-bs-target="#birthDetailsModal">
                                    <i class="bi bi-info-circle me-2"></i>বিস্তারিত দেখুন
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Death Certificate -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card death-certificate animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="text-center">
                        <div class="service-icon">🕊️</div>
                        <h4 class="mb-3">মৃত্যু সনদপত্র</h4>
                        <p class="text-muted mb-4">
                            মৃত্যু নিবন্ধন এবং মৃত্যু সনদপত্রের জন্য আবেদন করুন।
                            সম্পত্তি হস্তান্তর এবং পেনশনের জন্য প্রয়োজনীয়।
                        </p>

                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">সেবা ফি</small>
                                    <strong class="text-success">৭৫ টাকা</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">সময়</small>
                                    <strong class="text-primary">৫-১০ দিন</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">রেটিং</small>
                                    <strong class="text-warning">★★★★☆</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('deathcertificate') }}">
                                <button class="btn btn-apply" onclick="applyForCertificate('death')">
                                    <i class="bi bi-plus-circle me-2"></i>এখনই আবেদন করুন
                                </button>
                            </a>
                            <a href="{{ route('deathcertificate') }}">
                                <button class="btn btn-details" data-bs-toggle="modal" data-bs-target="#deathDetailsModal">
                                    <i class="bi bi-info-circle me-2"></i>বিস্তারিত দেখুন
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Marriage Certificate -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card marriage-certificate animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="text-center">
                        <div class="service-icon">💒</div>
                        <h4 class="mb-3">বিবাহ সনদপত্র</h4>
                        <p class="text-muted mb-4">
                            বিবাহ নিবন্ধন এবং বিবাহ সনদপত্রের জন্য আবেদন করুন।
                            আইনি স্বীকৃতি এবং সরকারি কাজের জন্য প্রয়োজনীয়।
                        </p>

                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">সেবা ফি</small>
                                    <strong class="text-success">১০০ টাকা</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">সময়</small>
                                    <strong class="text-primary">১০-১৫ দিন</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">রেটিং</small>
                                    <strong class="text-warning">★★★★★</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-apply" onclick="applyForCertificate('marriage')">
                                <i class="bi bi-plus-circle me-2"></i>এখনই আবেদন করুন
                            </button>
                            <button class="btn btn-details" data-bs-toggle="modal" data-bs-target="#marriageDetailsModal">
                                <i class="bi bi-info-circle me-2"></i>বিস্তারিত দেখুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Citizenship Certificate -->
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="service-card citizenship-certificate animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="text-center">
                        <div class="service-icon">🏛️</div>
                        <h4 class="mb-3">নাগরিকত্ব সনদপত্র</h4>
                        <p class="text-muted mb-4">
                            নাগরিকত্ব প্রত্যয়নপত্রের জন্য আবেদন করুন।
                            পাসপোর্ট এবং বিদেশ ভ্রমণের জন্য প্রয়োজনীয়।
                        </p>

                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">সেবা ফি</small>
                                    <strong class="text-success">১২৫ টাকা</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">সময়</small>
                                    <strong class="text-primary">১৪-২১ দিন</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">রেটিং</small>
                                    <strong class="text-warning">★★★★☆</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-apply" onclick="applyForCertificate('citizenship')">
                                <i class="bi bi-plus-circle me-2"></i>এখনই আবেদন করুন
                            </button>
                            <button class="btn btn-details" data-bs-toggle="modal" data-bs-target="#citizenshipDetailsModal">
                                <i class="bi bi-info-circle me-2"></i>বিস্তারিত দেখুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Character Certificate -->
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="service-card character-certificate animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="text-center">
                        <div class="service-icon">📋</div>
                        <h4 class="mb-3">চারিত্রিক সনদপত্র</h4>
                        <p class="text-muted mb-4">
                            চারিত্রিক প্রত্যয়নপত্রের জন্য আবেদন করুন।
                            চাকরি এবং বিভিন্ন সরকারি কাজের জন্য প্রয়োজনীয়।
                        </p>

                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">সেবা ফি</small>
                                    <strong class="text-success">১০০ টাকা</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">সময়</small>
                                    <strong class="text-primary">৭-১২ দিন</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">রেটিং</small>
                                    <strong class="text-warning">★★★★★</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-apply" onclick="applyForCertificate('character')">
                                <i class="bi bi-plus-circle me-2"></i>এখনই আবেদন করুন
                            </button>
                            <button class="btn btn-details" data-bs-toggle="modal" data-bs-target="#characterDetailsModal">
                                <i class="bi bi-info-circle me-2"></i>বিস্তারিত দেখুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    @endsection