@extends('layouts.admin')

@section('title','ইউনিয়ন পরিষদ নাগরিক সেবা - অ্যাডমিন প্যানেল')
@section('content')
<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Top Navigation -->
    <div class="top-navbar">
        <div class="d-flex align-items-center">
            <button class="toggle-btn me-3" id="toggleBtn">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="mb-0">অ্যাডমিন প্যানেল</h5>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle me-2"></i>অ্যাডমিন
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>প্রোফাইল</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>সেটিংস</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="">
                        <a
                            class="dropdown-item btn btn-primary ms-2 px-3"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            <span data-lang="logout">লগআউট</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="content-area">
        <div id="dashboard-content">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">১,২৫৪</div>
                        <div class="stats-label">মোট নাগরিক</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">৮৯</div>
                        <div class="stats-label">নতুন আবেদন</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">৪৫৬</div>
                        <div class="stats-label">সনদপত্র ইস্যু</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">৭৮,৫০০</div>
                        <div class="stats-label">মোট আয় (টাকা)</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="recent-activity">
                        <h5 class="mb-4">সাম্প্রতিক কার্যক্রম</h5>

                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-file-plus"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">নতুন জন্ম নিবন্ধন আবেদন</div>
                                <small class="text-muted">মোঃ রহিম উদ্দিন - ২ ঘন্টা আগে</small>
                            </div>
                            <span class="badge badge-custom">নতুন</span>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">ট্রেড লাইসেন্স অনুমোদন</div>
                                <small class="text-muted">ফাতেমা খাতুন - ৫ ঘন্টা আগে</small>
                            </div>
                            <span class="badge bg-success">সম্পন্ন</span>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">হোল্ডিং ট্যাক্স পেমেন্ট</div>
                                <small class="text-muted">করিম মিয়া - ১ দিন আগে</small>
                            </div>
                            <span class="badge bg-info">পেইড</span>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">চারিত্রিক সনদ ইস্যু</div>
                                <small class="text-muted">সালমা বেগম - ২ দিন আগে</small>
                            </div>
                            <span class="badge bg-warning">প্রক্রিয়াধীন</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="recent-activity">
                        <h5 class="mb-4">দ্রুত লিংক</h5>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-plus me-2"></i>নতুন আবেদন যোগ
                            </button>
                            <button class="btn btn-outline-success">
                                <i class="fas fa-download me-2"></i>রিপোর্ট ডাউনলোড
                            </button>
                            <button class="btn btn-outline-info">
                                <i class="fas fa-envelope me-2"></i>বার্তা পাঠান
                            </button>
                            <button class="btn btn-outline-warning">
                                <i class="fas fa-backup me-2"></i>ডাটা ব্যাকআপ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other page contents will be loaded here -->
        <div id="other-content" style="display: none;">
            <div class="alert alert-info">
                <h4 class="alert-heading">পেজ নির্মাণাধীন!</h4>
                <p>এই পেজটি এখনো তৈরি হয়নি। শীঘ্রই এটি উপলব্ধ হবে।</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar Toggle Functionality
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleBtn = document.getElementById('toggleBtn');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    });

    // Navigation functionality
    const navLinks = document.querySelectorAll('.nav-link');
    const dashboardContent = document.getElementById('dashboard-content');
    const otherContent = document.getElementById('other-content');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));

            // Add active class to clicked link
            this.classList.add('active');

            // Show appropriate content
            const page = this.getAttribute('data-page');
            if (page === 'dashboard') {
                dashboardContent.style.display = 'block';
                otherContent.style.display = 'none';
            } else {
                dashboardContent.style.display = 'none';
                otherContent.style.display = 'block';
            }
        });
    });

    // Auto-collapse sidebar on mobile
    function checkScreenSize() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
        }
    }

    // Check screen size on load and resize
    checkScreenSize();
    window.addEventListener('resize', checkScreenSize);

    // Add smooth scrolling for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endsection