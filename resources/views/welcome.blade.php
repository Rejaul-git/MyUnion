@extends('layouts.app')
@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content animate-fadeInUp">
                    <h1 class="hero-title" data-lang="hero-title">
                        সকল নাগরিক সেবা<br />এক ঠিকানায়
                    </h1>
                    <p class="hero-subtitle" data-lang="hero-subtitle">
                        ডিজিটাল বাংলাদেশের স্বপ্ন বাস্তবায়নে আমাদের সাথে থাকুন। সহজ,
                        দ্রুত এবং নির্ভরযোগ্য অনলাইন সেবা।
                    </p>
                    <div class="mt-4">
                        <a href="#services" class="quick-btn me-3">
                            <i class="fas fa-rocket me-2"></i>
                            <span data-lang="get-started">শুরু করুন</span>
                        </a>
                        <a href="#" class="quick-btn" onclick="showTrackingModal()">
                            <i class="fas fa-search me-2"></i>
                            <span data-lang="track-application">আবেদন খোঁজুন</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 infinity-move animate-fadeIn">
                <div class="text-center">
                    <img
                        src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 400'><rect width='500' height='400' fill='%23ffffff20'/><circle cx='250' cy='200' r='150' fill='%23ffffff10'/><text x='250' y='200' text-anchor='middle' fill='white' font-size='20'>স্মার্ট নাগরিক সেবা</text></svg>"
                        alt="Smart City"
                        class="img-fluid"
                        style="max-width: 400px" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Access -->
<section class="quick-access">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="mb-4" data-lang="quick-access">দ্রুত সেবা</h3>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <a
                            href="{{ route('tax.payment.form') }}"
                            class="quick-btn"
                            onclick="openService('tax-payment')">
                            <i class="fas fa-money-bill-wave me-2"></i>
                            <span data-lang="pay-tax">হোল্ডিং ট্যাক্স পরিশোধ</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a
                            href="{{ route('cirtificates') }}"
                            class="quick-btn"
                            onclick="openService('certificate')">
                            <i class="fas fa-certificate me-2"></i>
                            <span data-lang="certificate">সনদপত্র আবেদন</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a
                            href="{{ route('developmentComplaint') }}"
                            class="quick-btn"
                            onclick="openService('complaint')">
                            <i class="fas fa-comments me-2"></i>
                            <span data-lang="complaint">অভিযোগ দাখিল</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a
                            href="#emergency-report-form"
                            class="quick-btn"
                            onclick="openService('emergency')">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <span data-lang="emergency">জরুরি সেবা</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" id="totalUsers">15,247</span>
                    <div class="stat-label" data-lang="registered-users">
                        নিবন্ধিত ব্যবহারকারী
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" id="totalServices">1,983</span>
                    <div class="stat-label" data-lang="services-completed">
                        সেবা সম্পন্ন
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" id="satisfactionRate">98%</span>
                    <div class="stat-label" data-lang="satisfaction">
                        সন্তুষ্টির হার
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" id="avgTime">24</span>
                    <div class="stat-label" data-lang="avg-time">
                        গড় সময় (ঘণ্টা)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <h2 class="section-title" data-lang="our-services">আমাদের সেবাসমূহ</h2>
        <div class="row">
            <!-- সনদপত্র আবেদন -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('cirtificates') }}" class="text-decoration-none">
                    <div
                        class="service-card animate-fadeInUp"
                        onclick="openService('certificate')">
                        <i class="fas fa-certificate service-icon"></i>
                        <h4 class="service-title" data-lang="certificate">
                            সনদপত্র আবেদন
                        </h4>
                        <p class="service-description" data-lang="cert-desc">
                            জন্ম, মৃত্যু, বিবাহ এবং অন্যান্য সনদপত্রের জন্য অনলাইনে আবেদন
                            করুন
                        </p>
                    </div>
                </a>
            </div>

            <!-- Tax Payment Service -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('tax.payment.form') }}" class="text-decoration-none">
                    <div
                        class="service-card animate-fadeInUp">
                        <i class="fas fa-money-bill-wave service-icon"></i>
                        <h4 class="service-title" data-lang="tax-payment">কর পরিশোধ</h4>
                        <p class="service-description" data-lang="tax-desc">
                            হোল্ডিং ট্যাক্স, খাজনা এবং অন্যান্য স্থানীয় কর অনলাইনে পরিশোধ
                            করুন
                        </p>
                    </div>
                </a>

            </div>

            <!-- Social Allowance -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('social.allowance') }}" class="text-decoration-none">
                    <div
                        class="service-card animate-fadeInUp"
                        onclick="openService('social-allowance')">
                        <i class="fas fa-hand-holding-heart service-icon"></i>
                        <h4 class="service-title" data-lang="social-allowance">
                            সামাজিক ভাতা
                        </h4>
                        <p class="service-description" data-lang="social-desc">
                            বয়স্ক, বিধবা, প্রতিবন্ধী ভাতার জন্য অনলাইনে আবেদন করুন
                        </p>
                    </div>
                </a>
            </div>

            <!-- Village Court -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div
                    class="service-card animate-fadeInUp"
                    onclick="openService('village-court')">
                    <i class="fas fa-gavel service-icon"></i>
                    <h4 class="service-title" data-lang="village-court">
                        গ্রাম আদালত
                    </h4>
                    <p class="service-description" data-lang="court-desc">
                        গ্রাম আদালত ও সালিশের মামলা অনলাইনে দাখিল এবং শুনানি
                    </p>
                </div>
            </div>

            <!-- Infrastructure -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('developmentComplaint') }}" class="text-decoration-none">
                    <div
                        class="service-card animate-fadeInUp"
                        onclick="openService('infrastructure')">
                        <i class="fas fa-road service-icon"></i>
                        <h4 class="service-title" data-lang="infrastructure">
                            উন্নয়ন প্রকল্প
                        </h4>
                        <p class="service-description" data-lang="infra-desc">
                            রাস্তা, ব্রিজ, পানি ও স্যানিটেশন সংক্রান্ত অভিযোগ ও প্রস্তাব
                        </p>
                    </div>
                </a>
            </div>

            <!-- E-commerce -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div
                    class="service-card animate-fadeInUp"
                    onclick="openService('marketplace')">
                    <i class="fas fa-store service-icon"></i>
                    <h4 class="service-title" data-lang="marketplace">
                        স্থানীয় বাজার
                    </h4>
                    <p class="service-description" data-lang="market-desc">
                        স্থানীয় পণ্য কিনুন ও বিক্রি করুন কৃষি মার্কেটপ্লেসে
                    </p>
                </div>
            </div>

            <!-- Emergency Response -->
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                <div
                    class="service-card animate-fadeInUp"
                    onclick="openService('emergency')">
                    <i class="fas fa-exclamation-triangle service-icon"></i>
                    <h4 class="service-title" data-lang="emergency">
                        দুর্যোগ ব্যবস্থাপনা
                    </h4>
                    <p class="service-description" data-lang="emergency-desc">
                        দুর্যোগ সতর্কতা ও রেসপন্স ট্র্যাকিং সিস্টেম
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title" data-lang="ongoing-projects">
            চলমান প্রকল্পসমূহ
        </h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">চলমান</div>
                        <h5 class="mt-3" data-lang="road-project">
                            মেইন রোড সংস্কার প্রকল্প
                        </h5>
                        <p data-lang="road-desc">
                            ৫ কিলোমিটার রাস্তা সংস্কার কাজ ৬০% সম্পন্ন
                        </p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 60%">
                                60%
                            </div>
                        </div>
                        <button
                            class="btn btn-sm btn-outline-primary"
                            onclick="viewProjectDetails('road')">
                            বিস্তারিত
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">পরিকল্পিত</div>
                        <h5 class="mt-3" data-lang="water-project">
                            পানি সরবরাহ প্রকল্প
                        </h5>
                        <p data-lang="water-desc">নতুন পানি সরবরাহ লাইন স্থাপন</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-info" style="width: 25%">25%</div>
                        </div>
                        <button
                            class="btn btn-sm btn-outline-primary"
                            onclick="viewProjectDetails('water')">
                            বিস্তারিত
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">সম্পন্ন</div>
                        <h5 class="mt-3" data-lang="bridge-project">
                            নতুন ব্রিজ নির্মাণ
                        </h5>
                        <p data-lang="bridge-desc">কমিউনিটি ব্রিজ নির্মাণ সম্পন্ন</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 100%">
                                100%
                            </div>
                        </div>
                        <button
                            class="btn btn-sm btn-success"
                            onclick="viewProjectDetails('bridge')">
                            সম্পন্ন
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="container">
        <h2 class="section-title" data-lang="latest-news">সাম্প্রতিক সংবাদ</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">৫ সেপ্টেম্বর</div>
                        <h5 class="mt-3">ডিজিটাল সেবা সপ্তাহ শুরু</h5>
                        <p>নাগরিকদের জন্য বিশেষ ছাড় ও দ্রুত সেবা প্রদান</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">৩ সেপ্টেম্বর</div>
                        <h5 class="mt-3">নতুন অনলাইন সেবা চালু</h5>
                        <p>জমির দাগ নম্বর যাচাই এখন অনলাইনে সম্ভব</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card">
                    <div class="card-body p-4">
                        <div class="news-date">১ সেপ্টেম্বর</div>
                        <h5 class="mt-3">মোবাইল ব্যাংকিং সুবিধা</h5>
                        <p>বিকাশ ও নগদের মাধ্যমে ট্যাক্স পরিশোধ শুরু</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Local E-commerce & Agricultural Marketplace -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title" style="color: #2c5530">
            স্থানীয় মার্কেটপ্লেস
        </h2>
        <p class="text-center mb-5" style="color: #4a7c59">
            আমাদের প্ল্যাটফর্মে স্থানীয় কৃষক ও ব্যবসায়ীদের পণ্য কিনুন ও বিক্রি
            করুন
        </p>

        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div
                    class="card"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(44, 85, 48, 0.08);
                border-radius: 15px;
              ">
                    <img
                        src="{{ asset('images/sobgi.jpeg') }}"
                        class="card-img-top"
                        alt="তাজা সবজি"
                        style="border-radius: 15px 15px 0 0" />
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2c5530">তাজা সবজি</h5>
                        <p class="card-text" style="color: #666">স্থানীয় খামার থেকে</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold" style="color: #4caf50">৳২৫/কেজি</span>
                            <a
                                href="#"
                                class="btn btn-sm"
                                style="
                      background: linear-gradient(135deg, #4caf50, #45a049);
                      color: white;
                      border-radius: 8px;
                    ">কার্টে যোগ করুন</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div
                    class="card"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(44, 85, 48, 0.08);
                border-radius: 15px;
              ">
                    <img
                        src="{{ asset('images/fruits.jpeg') }}"
                        class="card-img-top"
                        alt="জৈব ফল"
                        style="border-radius: 15px 15px 0 0" />
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2c5530">জৈব ফল</h5>
                        <p class="card-text" style="color: #666">মৌসুমী ও তাজা</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold" style="color: #4caf50">৳২০০/কেজি</span>
                            <a
                                href="#"
                                class="btn btn-sm"
                                style="
                      background: linear-gradient(135deg, #4caf50, #45a049);
                      color: white;
                      border-radius: 8px;
                    ">কার্টে যোগ করুন</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div
                    class="card"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(44, 85, 48, 0.08);
                border-radius: 15px;
              ">
                    <img
                        src="{{ asset('images/hostosilpo.jpeg') }}"
                        class="card-img-top"
                        alt="হস্তশিল্প"
                        style="border-radius: 15px 15px 0 0" />
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2c5530">হস্তশিল্প</h5>
                        <p class="card-text" style="color: #666">
                            স্থানীয় শিল্পীদের পণ্য
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold" style="color: #4caf50">৳১০০</span>
                            <a
                                href="#"
                                class="btn btn-sm"
                                style="
                      background: linear-gradient(135deg, #4caf50, #45a049);
                      color: white;
                      border-radius: 8px;
                    ">কার্টে যোগ করুন</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div
                    class="card"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(44, 85, 48, 0.08);
                border-radius: 15px;
              ">
                    <img
                        src="{{ asset('images/dairiproducts.jpeg') }}"
                        class="card-img-top"
                        alt="ডেইরি পণ্য"
                        style="border-radius: 15px 15px 0 0" />
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2c5530">ডেইরি পণ্য</h5>
                        <p class="card-text" style="color: #666">তাজা দুধ ও চিজ</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold" style="color: #4caf50">৳১৮০</span>
                            <a
                                href="#"
                                class="btn btn-sm"
                                style="
                      background: linear-gradient(135deg, #4caf50, #45a049);
                      color: white;
                      border-radius: 8px;
                    ">কার্টে যোগ করুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a
                href="#"
                class="btn me-2"
                style="
              background: linear-gradient(135deg, #4caf50, #45a049);
              color: white;
              border-radius: 10px;
            ">মার্কেটপ্লেস দেখুন</a>
            <a
                href="#"
                class="btn"
                style="
              background: linear-gradient(135deg, #2c5530, #4a7c59);
              color: white;
              border-radius: 10px;
            ">পণ্য বিক্রি করুন</a>
        </div>
    </div>
</section>

<!-- Disaster Alert & Response Tracking -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title" style="color: #dc3545">
            দুর্যোগ সতর্কতা ও রেসপন্স
        </h2>
        <p class="text-center mb-5" style="color: #c82333">
            রিয়েল-টাইম সতর্কতা ও জরুরি সেবার তথ্য
        </p>

        <div class="row mb-5">
            <div class="col-md-8 mx-auto">
                <div
                    class="card alert-card"
                    style="
                background: linear-gradient(135deg, #dc3545, #c82333);
                color: white;
                border-radius: 15px;
              ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <span class="fs-2">⚠</span>
                            </div>
                            <div>
                                <h4 class="card-title mb-1" style="color: white">
                                    আবহাওয়া সতর্কতা
                                </h4>
                                <p class="mb-0">
                                    পরবর্তী ৪৮ ঘণ্টায় ভারী বৃষ্টিপাতের সম্ভাবনা। নিচু এলাকায়
                                    জলাবদ্ধতার আশঙ্কা।
                                </p>
                                <small>আপডেট: ৩০ মিনিট আগে</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <!-- <div
                    class="card h-100"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(220, 53, 69, 0.08);
                border-radius: 15px;
              ">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #dc3545">
                            জরুরি প্রস্তুতি
                        </h4>
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex align-items-center"
                                style="border: none">
                                <span class="me-3" style="color: #4caf50">+</span>
                                <div>
                                    <h6 class="mb-0" style="color: #2c5530">জরুরি যোগাযোগ</h6>
                                    <p class="mb-0" style="color: #666">
                                        দুর্যোগ মোকাবিলায় গুরুত্বপূর্ণ ফোন নম্বর
                                    </p>
                                </div>
                            </li>
                            <li
                                class="list-group-item d-flex align-items-center"
                                style="border: none">
                                <span class="me-3" style="color: #45a049">📍</span>
                                <div>
                                    <h6 class="mb-0" style="color: #2c5530">
                                        আশ্রয় কেন্দ্র
                                    </h6>
                                    <p class="mb-0" style="color: #666">
                                        নিকটস্থ জরুরি আশ্রয় কেন্দ্র খুঁজুন
                                    </p>
                                </div>
                            </li>
                            <li
                                class="list-group-item d-flex align-items-center"
                                style="border: none">
                                <span class="me-3" style="color: #4a7c59">🚛</span>
                                <div>
                                    <h6 class="mb-0" style="color: #2c5530">ত্রাণ বিতরণ</h6>
                                    <p class="mb-0" style="color: #666">
                                        ত্রাণ সামগ্রীর বিতরণ ট্র্যাক করুন
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->

                <!-- jaskjaskl -->
                <div class="card h-100" style="border: none; box-shadow: 0 5px 15px rgba(220, 53, 69, 0.08); border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="color: #dc3545">
                            জরুরি তথ্য
                        </h4>
                        <p class="mb-4" style="color: #c82333">
                            নিচের ট্যাবগুলোতে ক্লিক করে বিস্তারিত দেখুন:
                        </p>
                        <!-- Nav pills -->
                        <ul class="nav nav-pills mb-3" id="emergencyTab" role="tablist" style="gap: 8px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"
                                    id="contacts-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#contacts"
                                    type="button"
                                    role="tab"
                                    aria-controls="contacts"
                                    aria-selected="true"
                                    style="background: linear-gradient(135deg, #dc3545, #c82333); color: #fff; border-radius: 8px;">
                                    জরুরি যোগাযোগ
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="shelter-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#shelter"
                                    type="button"
                                    role="tab"
                                    aria-controls="shelter"
                                    aria-selected="false"
                                    style="background: linear-gradient(135deg, #4caf50, #45a049); color: #fff; border-radius: 8px;">
                                    আশ্রয় কেন্দ্র
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="relief-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#relief"
                                    type="button"
                                    role="tab"
                                    aria-controls="relief"
                                    aria-selected="false"
                                    style="background: linear-gradient(135deg, #2c5530, #4a7c59); color: #fff; border-radius: 8px;">
                                    ত্রাণ বিতরণ
                                </button>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content" id="emergencyTabContent">
                            <!-- জরুরি যোগাযোগ -->
                            <div class="tab-pane fade show active" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle" style="background: #fff; border-radius: 10px;">
                                        <thead style="background: linear-gradient(135deg, #dc3545, #c82333); color: #fff;">
                                            <tr>
                                                <th>সংস্থা / দায়িত্ব</th>
                                                <th>নাম্বার</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>পুলিশ</td>
                                                <td>999 / 112</td>
                                                <td>জরুরি পুলিশ সাপোর্ট</td>
                                            </tr>
                                            <tr>
                                                <td>ফায়ার সার্ভিস</td>
                                                <td>998</td>
                                                <td>অগ্নিকাণ্ড বা উদ্ধার কাজে</td>
                                            </tr>
                                            <tr>
                                                <td>অ্যাম্বুলেন্স</td>
                                                <td>997</td>
                                                <td>জরুরি চিকিৎসা সহায়তা</td>
                                            </tr>
                                            <tr>
                                                <td>স্থানীয় প্রশাসন</td>
                                                <td>01534943038</td>
                                                <td>স্থানীয় অফিস/ইউনিয়ন অফিস</td>
                                            </tr>
                                            <tr>
                                                <td>রেড ক্রস / রেড ক্রিসেন্ট</td>
                                                <td>01623453453</td>
                                                <td>ত্রাণ ও সাহায্য কেন্দ্র</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- আশ্রয় কেন্দ্র -->
                            <div class="tab-pane fade" id="shelter" role="tabpanel" aria-labelledby="shelter-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle" style="background: #fff; border-radius: 10px;">
                                        <thead style="background: linear-gradient(135deg, #4caf50, #45a049); color: #fff;">
                                            <tr>
                                                <th>কেন্দ্রের নাম</th>
                                                <th>ঠিকানা</th>
                                                <th>ধরণ</th>
                                                <th>খোলা সময়</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ইউনিয়ন কমিউনিটি হল</td>
                                                <td>বাকতা বাজার</td>
                                                <td>স্কুল/হল</td>
                                                <td>24/7</td>
                                            </tr>
                                            <tr>
                                                <td>সরকারি উচ্চ বিদ্যালয়</td>
                                                <td>টুরখাই পাড়া</td>
                                                <td>স্কুল</td>
                                                <td>সকাল 8 – রাত 10</td>
                                            </tr>
                                            <tr>
                                                <td>মসজিদ কমপ্লেক্স</td>
                                                <td>বোলতা বাজার</td>
                                                <td>ধর্মীয় স্থান</td>
                                                <td>24/7</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- ত্রাণ বিতরণ -->
                            <div class="tab-pane fade" id="relief" role="tabpanel" aria-labelledby="relief-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle" style="background: #fff; border-radius: 10px;">
                                        <thead style="background: linear-gradient(135deg, #2c5530, #4a7c59); color: #fff;">
                                            <tr>
                                                <th>কেন্দ্রের নাম</th>
                                                <th>বিতরণের তারিখ/সময়</th>
                                                <th>উপলব্ধ সামগ্রী</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ইউনিয়ন অফিস</td>
                                                <td>20 সেপ্টেম্বর, 10:00-16:00</td>
                                                <td>চাল, আটা, পানি, ওষুধ</td>
                                            </tr>
                                            <tr>
                                                <td>কমিউনিটি হল</td>
                                                <td>21 সেপ্টেম্বর, 09:00-15:00</td>
                                                <td>কম্বল, লাইটার, খাদ্য</td>
                                            </tr>
                                            <tr>
                                                <td>মসজিদ কমপ্লেক্স</td>
                                                <td>22 সেপ্টেম্বর, 08:00-14:00</td>
                                                <td>পানি, শুকনো খাবার</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- jaskjaskl -->
            </div>

            <div class="col-md-6 " id="emergency-report-form">
                <div
                    class="card h-100"
                    style="
                border: none;
                box-shadow: 0 5px 15px rgba(220, 53, 69, 0.08);
                border-radius: 15px;
              ">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #dc3545">
                            জরুরি রিপোর্ট করুন
                        </h4>
                        <form>
                            <div class="mb-3">
                                <label class="form-label" style="color: #2c5530">দুর্যোগের ধরন</label>
                                <select class="form-select" style="border-radius: 8px">
                                    <option selected>দুর্যোগের ধরন নির্বাচন করুন</option>
                                    <option>বন্যা</option>
                                    <option>ঝড়</option>
                                    <option>আগুন</option>
                                    <option>ভূমিকম্প</option>
                                    <option>চিকিৎসা জরুরি</option>
                                    <option>অন্যান্য</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #2c5530">অবস্থান</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="আপনার অবস্থান লিখুন"
                                    style="border-radius: 8px" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #2c5530">বর্ণনা</label>
                                <textarea
                                    class="form-control"
                                    rows="3"
                                    placeholder="দুর্যোগ পরিস্থিতি বিস্তারিত লিখুন"
                                    style="border-radius: 8px"></textarea>
                            </div>
                            <button
                                onclick="alertSent()"
                                type="submit"
                                class="btn w-100"
                                style="
                      background: linear-gradient(135deg, #dc3545, #c82333);
                      color: white;
                      border-radius: 10px;
                    ">
                                জরুরি সতর্কতা পাঠান
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function alertSent(event) {
        if (event) event.preventDefault();

        // Remove any existing alert or loader
        var existing = document.getElementById('custom-alert');
        if (existing) existing.remove();
        var loader = document.getElementById('custom-loader');
        if (loader) loader.remove();

        // Create loader
        var loaderDiv = document.createElement('div');
        loaderDiv.id = 'custom-loader';
        loaderDiv.style.position = 'fixed';
        loaderDiv.style.top = '100px';
        loaderDiv.style.right = '20px';
        loaderDiv.style.zIndex = '9999';
        loaderDiv.innerHTML = `
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <span style="margin-left:10px;color:#dc3545;font-weight:bold;">জরুরি সতর্কতা পাঠানো হচ্ছে...</span>
        `;
        document.body.appendChild(loaderDiv);

        setTimeout(function() {
            // Remove loader
            var loader = document.getElementById('custom-loader');
            if (loader) loader.remove();

            // Create alert container
            var alertDiv = document.createElement('div');
            alertDiv.id = 'custom-alert';
            alertDiv.style.position = 'fixed';
            alertDiv.style.top = '80px';
            alertDiv.style.right = '20px';
            alertDiv.style.zIndex = '9999';

            // Set alert HTML
            alertDiv.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    আপনার জরুরি সতর্কতা সফলভাবে পাঠানো হয়েছে।
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close" onclick="this.closest('#custom-alert').remove();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
            document.body.appendChild(alertDiv);

            // Auto remove after 4 seconds
            setTimeout(function() {
                var alertDiv = document.getElementById('custom-alert');
                if (alertDiv) alertDiv.remove();
            }, 4000);
        }, 2000);
    }

    // Attach to form submit
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('#emergency-report-form form');
        if (form) {
            form.onsubmit = alertSent;
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection