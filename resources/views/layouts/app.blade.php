<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>স্মার্ট নাগরিক সেবা | Municipal Citizen Services</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body>
    <!-- Language Switcher -->
    <div class="language-switcher">
        <!-- <button class="lang-btn active" onclick="switchLanguage('bn')">
            বাং
        </button>
        <button class="lang-btn" onclick="switchLanguage('en')">EN</button> -->
        <!-- Language Buttons -->
        <button onclick="doGTranslate('en|en')" class="btn btn-primary">English</button>
        <button onclick="doGTranslate('en|bn')" class="btn btn-success">বাংলা</button>

    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-city me-2"></i>
                <span data-lang="title">স্মার্ট নাগরিক সেবা</span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" data-lang="nav-home">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services" data-lang="nav-services">সেবাসমূহ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects" data-lang="nav-projects">প্রকল্প</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="#marketplace"
                            data-lang="nav-marketplace">মার্কেটপ্লেস</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-lang="nav-contact">যোগাযোগ</a>
                    </li>
                    @if (!Auth::check())
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href=""
                            data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <i class="fas fa-sign-in-alt me-1"></i>
                            <span data-lang="login">লগইন</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href="{{ route('register') }}">
                            <i class=" fas fa-user-plus me-1"></i>
                            <span data-lang="register">রেজিস্টার</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-user me-1"></i>
                            <span data-lang="profile">এডমিন প্রোফাইল</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            <span data-lang="logout">লগআউট</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            <span data-lang="logout">লগআউট</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <!-- profile dashboard -->
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-primary ms-2 px-3"
                            href="{{ route('user.dashboard') }}">
                            <i class="fas fa-user me-1"></i>
                            <span data-lang="profile">প্রোফাইল</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5 data-lang="quick-links">দ্রুত লিংক</h5>
                        <a href="#" class="footer-link" data-lang="about">আমাদের সম্পর্কে</a>
                        <a href="#" class="footer-link" data-lang="about">আমাদের সম্পর্কে</a>
                        <a href="#" class="footer-link" data-lang="services">সেবা</a>
                        <a href="#" class="footer-link" data-lang="projects">প্রকল্প</a>
                        <a href="#" class="footer-link" data-lang="contact">যোগাযোগ</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5 data-lang="resources">সম্পদসমূহ</h5>
                        <a href="#" class="footer-link" data-lang="faq">প্রশ্নোত্তর</a>
                        <a href="#" class="footer-link" data-lang="support">সহায়তা কেন্দ্র</a>
                        <a href="#" class="footer-link" data-lang="privacy">গোপনীয়তা নীতি</a>
                        <a href="#" class="footer-link" data-lang="terms">শর্তাবলী</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5 data-lang="contact-us">যোগাযোগ করুন</h5>
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>১২৩ মেইন স্ট্রিট,
                            ঢাকা, বাংলাদেশ
                        </p>
                        <p><i class="fas fa-phone me-2"></i>+৮৮ ০১২৩৪৫৬৭৮৯০</p>
                        <p>
                            <i class="fas fa-envelope me-2"></i>
                            <a
                                href="mailto:2K6B4@example.com "
                                style="text-decoration: none; color: #ffffff">2K6B4@example.com</a>
                        </p>
                        <div>
                            <a href="#" class="footer-link me-3">
                                <i class="fab fa-facebook-f"></i> facebook
                            </a>
                            <a href="#" class="footer-link me-3">
                                <i class="fab fa-twitter"></i> twitter
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5 data-lang="newsletter">নিউজলেটার</h5>
                        <p data-lang="subscribe-text">
                            সর্বশেষ আপডেট পেতে আমাদের নিউজলেটারে সাবস্ক্রাইব করুন।
                        </p>
                        <form id="newsletterForm">
                            <div class="mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="newsletterEmail"
                                    placeholder="আপনার ইমেইল"
                                    required />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-success"
                                data-lang="subscribe-btn">
                                সাবস্ক্রাইব
                            </button>
                            <!-- সঠিক Google Maps embed code -->
                        </form>
                        <div id="map" class="mt-3">
                            <div class="map-container">
                                <!-- Method 1: OpenStreetMap (Always works) -->
                                <iframe
                                    src="https://www.openstreetmap.org/export/embed.html?bbox=90.3505%2C23.7209%2C90.4305%2C23.7812&amp;layer=mapnik&amp;marker=23.751067%2C90.393054"
                                    style="border: 1px solid black">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                &copy; ২০২৪ স্মার্ট নাগরিক সেবা. সর্বস্বত্ব সংরক্ষিত.
            </div>
        </div>
    </footer>
    <!-- Loading Spinner -->
    <div class="loading-spinner" id="loadingSpinner">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p data-lang="loading">লোড হচ্ছে...</p>
    </div>
    <!-- Login Modal -->
    <!-- Login Modal -->
    <div
        class="modal fade"
        id="loginModal"
        tabindex="-1"
        aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">
                        <i class="fas fa-user-circle me-2"></i>লগইন করুন
                    </h5>
                    <button
                        type="button"
                        class="btn-close"

                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <!-- Alert Messages -->
                    <div id="alertContainer"></div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating">
                            <i class="fas fa-mobile-alt input-icon"></i>
                            <input
                                type="number"
                                class="form-control"
                                id="phoneNumber"
                                name="phone"
                                placeholder="মোবাইল নম্বর"
                                required />
                            <label for="phoneNumber">মোবাইল নম্বর</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating">
                            <i class="fas fa-lock input-icon"></i>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="password"
                                placeholder="পাসওয়ার্ড"
                                required />
                            <label for="password">পাসওয়ার্ড</label>
                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword()">
                                <i class="fas fa-eye" id="passwordToggleIcon"></i>
                            </button>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div
                            class="d-flex justify-content-between align-items-center mb-3">
                            <div class="remember-me">
                                <input type="checkbox" id="rememberMe" name="remember" />
                                <label for="rememberMe">আমাকে মনে রাখুন</label>
                            </div>
                            <div class="forgot-password">
                                <a href="#" onclick="showForgotPassword()">পাসওয়ার্ড ভুলে গেছেন?</a>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>লগইন করুন
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="divider">
                        <span>অথবা</span>
                    </div>

                    <!-- Social Login -->
                    <div class="social-login">
                        <button
                            class="btn btn-social btn-google"
                            onclick="socialLogin('google')">
                            <i class="fab fa-google"></i>
                        </button>
                        <button
                            class="btn btn-social btn-facebook"
                            onclick="socialLogin('facebook')">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="register-link">
                        <span>নতুন ব্যবহারকারী? </span>
                        <a href="#" onclick="showRegister()">এখানে নিবন্ধন করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----end--- -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form Submission Handler
        document
            .getElementById("loginForm")
            .addEventListener("submit", function(e) {
                // e.preventDefault();

                const phoneNumber = document.getElementById("phoneNumber").value;
                const password = document.getElementById("password").value;
                const submitBtn = this.querySelector('button[type="submit"]');

                // Validation
                if (!validatePhoneNumber(phoneNumber)) {
                    showAlert("অনুগ্রহ করে সঠিক মোবাইল নম্বর দিন (১১ ডিজিট)", "danger");
                    return;
                }

                if (password.length < 6) {
                    showAlert("পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে", "danger");
                    return;
                }

                // Show loading
                submitBtn.innerHTML = '<span class="loading"></span> লগইন হচ্ছে...';
                submitBtn.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    // Simulate successful login
                    if (phoneNumber === "01700000000" && password === "123456") {
                        showAlert("সফলভাবে লগইন হয়েছে! স্বাগতম।", "success");
                        setTimeout(() => {
                            const modal = bootstrap.Modal.getInstance(
                                document.getElementById("loginModal")
                            );
                            modal.hide();
                            // Redirect to dashboard or reload page
                            window.location.reload();
                        }, 2000);
                    } else {
                        showAlert(
                            "ভুল মোবাইল নম্বর বা পাসওয়ার্ড। আবার চেষ্টা করুন।",
                            "danger"
                        );
                    }

                    // Reset button
                    submitBtn.innerHTML =
                        '<i class="fas fa-sign-in-alt me-2"></i>লগইন করুন';
                    submitBtn.disabled = false;
                }, 2000);
            });

        // Phone Number Formatting
        document
            .getElementById("phoneNumber")
            .addEventListener("input", function() {
                let value = this.value.replace(/[^0-9]/g, "");
                if (value.length > 11) {
                    value = value.slice(0, 11);
                }
                this.value = value;
            });

        // Phone Number Validation
        function validatePhoneNumber(phone) {
            const phoneRegex = /^01[3-9]\d{8}$/;
            return phoneRegex.test(phone);
        }

        // Password Toggle
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("passwordToggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.className = "fas fa-eye-slash";
            } else {
                passwordInput.type = "password";
                toggleIcon.className = "fas fa-eye";
            }
        }

        // Show Alert Function
        function showAlert(message, type) {
            const alertContainer = document.getElementById("alertContainer");
            const alertClass =
                type === "success" ? "alert-success" : "alert-danger";
            const iconClass =
                type === "success" ? "fa-check-circle" : "fa-exclamation-triangle";

            alertContainer.innerHTML = `
                <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                    <i class="fas ${iconClass} me-2"></i>${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;

            // Auto hide after 5 seconds
            setTimeout(() => {
                const alert = alertContainer.querySelector(".alert");
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 5000);
        }

        // Social Login
        function socialLogin(provider) {
            showAlert(
                `${
            provider === "google" ? "গুগল" : "ফেসবুক"
          } দিয়ে লগইন ফিচার শীঘ্রই আসছে`,
                "success"
            );
        }

        // Show Forgot Password
        function showForgotPassword() {
            showAlert(
                "পাসওয়ার্ড রিসেট লিংক আপনার নিবন্ধিত মোবাইল নম্বরে পাঠানো হবে",
                "success"
            );
        }

        // Show Register Modal (Demo)
        function showRegister() {
            window.location.href = "{{ route('register') }}";
        }

        // Demo credentials hint
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                showAlert("ডেমো: মোবাইল: 01700000000, পাসওয়ার্ড: 123456", "success");
            }, 1000);
        });

        // Clear alerts when modal is hidden
        document
            .getElementById("loginModal")
            .addEventListener("hidden.bs.modal", function() {
                document.getElementById("alertContainer").innerHTML = "";
                document.getElementById("loginForm").reset();
            });
    </script>
    <div id="google_translate_element"></div>

    <!-- Hidden Google Translate Element -->
    <div id="google_translate_element" style="display:none;"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en', // ডিফল্ট ভাষা (en or bn)
                includedLanguages: 'en,bn', // শুধু English & Bangla
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    <!-- Google Translate Script -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script type="text/javascript">
        function doGTranslate(lang_pair) {
            if (lang_pair.value) lang_pair = lang_pair.value;
            if (lang_pair == '') return;
            var lang = lang_pair.split('|')[1];
            var teCombo;
            var sel = document.getElementsByTagName('select');
            for (var i = 0; i < sel.length; i++)
                if (sel[i].className == 'goog-te-combo') teCombo = sel[i];
            if (teCombo == null || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                setTimeout(function() {
                    doGTranslate(lang_pair)
                }, 500);
            } else {
                teCombo.value = lang;
                teCombo.dispatchEvent(new Event("change"));
            }
        }
    </script>


    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>