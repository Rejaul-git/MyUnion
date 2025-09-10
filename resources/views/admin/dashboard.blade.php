<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ইউনিয়ন পরিষদ নাগরিক সেবা - অ্যাডমিন প্যানেল</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --primary-color: #2c5530;
            --secondary-color: #4a7c59;
            --accent-color: #8bc34a;
            --text-light: #ffffff;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-header h4 {
            color: var(--text-light);
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .sidebar-header h4 {
            opacity: 0;
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: var(--primary-color);
            font-size: 20px;
            font-weight: bold;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            padding: 15px 20px;
            border-radius: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-light) !important;
            transform: translateX(5px);
        }

        .nav-link.active {
            background-color: var(--accent-color);
            color: var(--primary-color) !important;
        }

        .nav-link i {
            font-size: 18px;
            width: 20px;
            text-align: center;
            margin-right: 15px;
            transition: margin 0.3s ease;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .nav-text {
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .toggle-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: var(--secondary-color);
            transform: scale(1.05);
        }

        .content-area {
            padding: 30px;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--accent-color);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .stats-label {
            color: #666;
            font-size: 14px;
        }

        .recent-activity {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
        }

        .badge-custom {
            background: var(--accent-color);
            color: var(--primary-color);
        }

        .tooltip-custom {
            position: absolute;
            left: 70px;
            background: var(--primary-color);
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 12px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            white-space: nowrap;
            z-index: 1001;
        }

        .sidebar.collapsed .nav-link:hover .tooltip-custom {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: var(--sidebar-collapsed-width);
            }

            .main-content {
                margin-left: var(--sidebar-collapsed-width);
            }

            .content-area {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-building"></i>
            </div>
            <h4>ইউনিয়ন পরিষদ</h4>
        </div>

        <nav class="nav flex-column">
            <a class="nav-link active" href="#" data-page="dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span class="nav-text">ড্যাশবোর্ড</span>
                <div class="tooltip-custom">ড্যাশবোর্ড</div>
            </a>

            <a class="nav-link" href="#" data-page="citizens">
                <i class="fas fa-users"></i>
                <span class="nav-text">নাগরিক তথ্য</span>
                <div class="tooltip-custom">নাগরিক তথ্য</div>
            </a>

            <a class="nav-link" href="#" data-page="services">
                <i class="fas fa-clipboard-list"></i>
                <span class="nav-text">সেবা সমূহ</span>
                <div class="tooltip-custom">সেবা সমূহ</div>
            </a>

            <a class="nav-link" href="#" data-page="certificates">
                <i class="fas fa-certificate"></i>
                <span class="nav-text">সনদপত্র</span>
                <div class="tooltip-custom">সনদপত্র</div>
            </a>

            <a class="nav-link" href="#" data-page="applications">
                <i class="fas fa-file-alt"></i>
                <span class="nav-text">আবেদন সমূহ</span>
                <div class="tooltip-custom">আবেদন সমূহ</div>
            </a>

            <a class="nav-link" href="#" data-page="payments">
                <i class="fas fa-money-bill-wave"></i>
                <span class="nav-text">পেমেন্ট</span>
                <div class="tooltip-custom">পেমেন্ট</div>
            </a>

            <a class="nav-link" href="#" data-page="reports">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-text">রিপোর্ট</span>
                <div class="tooltip-custom">রিপোর্ট</div>
            </a>

            <a class="nav-link" href="#" data-page="notifications">
                <i class="fas fa-bell"></i>
                <span class="nav-text">নোটিফিকেশন</span>
                <div class="tooltip-custom">নোটিফিকেশন</div>
            </a>

            <a class="nav-link" href="#" data-page="settings">
                <i class="fas fa-cog"></i>
                <span class="nav-text">সেটিংস</span>
                <div class="tooltip-custom">সেটিংস</div>
            </a>

            <a class="nav-link" href="#" data-page="users">
                <i class="fas fa-user-shield"></i>
                <span class="nav-text">ব্যবহারকারী</span>
                <div class="tooltip-custom">ব্যবহারকারী</div>
            </a>
        </nav>
    </div>

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
</body>

</html>