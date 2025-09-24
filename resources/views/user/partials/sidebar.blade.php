<!-- Sidebar -->
<div class="">
    <div class="sidebar">
        <a href="{{ route('home') }}" style="text-decoration: none;">
            <div class="logo">
                <i class="bi bi-building"></i> ইউনিয়ন পরিষদ
            </div>
        </a>


        <nav class="nav flex-column">
            <a class="nav-link {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}" href="{{ route('user.dashboard') }}" data-page="dashboard">
                <i class="bi bi-house-door"></i> ড্যাশবোর্ড
            </a>
            <a class="nav-link {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}" href="{{ route('user.profile') }}" data-page="profile">
                <i class="bi bi-person-gear"></i> প্রোফাইল সম্পন্য করুন
            </a>
            <a class="nav-link {{ Route::currentRouteName() == 'user.usermangment' ? 'active' : '' }} " href="{{ route('user.usermangment') }}" data-page="profile">
                <i class="bi bi-person-gear"></i> প্রোফাইল ব্যবস্থাপনা
            </a>
            <a class="nav-link {{ Route::currentRouteName() == 'user.certificatesService' ? 'active' : '' }}" href="{{ route('user.certificatesService') }}" data-page="certificates">
                <i class="bi bi-file-earmark-text"></i> সার্টিফিকেট সার্ভিসেস
            </a>
            <a class="nav-link menu-notification" href="#" data-page="applications">
                <i class="bi bi-file-check"></i> আবেদন সমূহ
                <span class="notification-badge">3</span>
            </a>
            <a class="nav-link {{ Route::currentRouteName() == 'tax.dashboard' ? 'active' : '' }}" href="{{ route('tax.dashboard') }}" data-page="tax payment">
                <i class="bi bi-calendar-event"></i> ট্যাক্স ও পেমেন্ট
            </a>
            <a class="nav-link" href="#" data-page="social grants">
                <i class="bi bi-journal-text"></i> সামাজিক ভাতা
            </a>
            <a class="nav-link" href="#" data-page="gram court">
                <i class="bi bi-file-earmark-text"></i> গ্রাম আদালত
            </a>
            <a class="nav-link" href="#" data-page="market">
                <i class="bi bi-people"></i> স্থানীয় মার্কেটপ্লেস
            </a>
            <a class="nav-link" href="#" data-page="festival">
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
                <a class="nav-link" href="#" data-page="logout">
                    <i class="bi bi-question-circle"></i> লগআউট
                </a>
        </nav>
    </div>
</div>