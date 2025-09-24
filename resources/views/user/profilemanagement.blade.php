@extends('layouts.user')
@section('title', 'আপনার প্রোফাইল সম্পূর্ণ করুন')
@section('content')
{{-- User data will be displayed dynamically --}}

<style>
    body {
        font-family: 'Noto Sans Bengali', Arial, sans-serif;
        background: linear-gradient(135deg, #ffffffff 0%, #ffffffff 100%);
        min-height: 100vh;
    }

    .page-header {
        background: linear-gradient(135deg, #8bc34a 0%, #8bc34a 100%);
        color: white;
        padding: 2.5rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .profile-card:hover::before {
        left: 100%;
    }

    .profile-card:hover {
        transform: translateY(-5px);
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .avatar-upload {
        position: relative;
        display: inline-block;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        cursor: pointer;
    }

    .avatar-upload:hover .avatar-overlay {
        opacity: 1;
    }

    .section-header {
        background: linear-gradient(135deg, #8bc34a 0%, #8bc34a 100%);
        color: white;
        border-radius: 15px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff6b6b;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        background: white;
    }

    .btn-save {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        border-radius: 25px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 25px rgba(40, 167, 69, 0.4);
        color: white;
    }

    .btn-cancel {
        background: transparent;
        border: 2px solid #6c757d;
        border-radius: 25px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        color: #6c757d;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: #6c757d;
        color: white;
        transform: translateY(-2px);
    }

    .btn-edit {
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
        border: none;
        border-radius: 20px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        color: white;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        color: white;
    }

    .activity-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #00b894;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        transform: translateX(10px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .activity-login {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
    }

    .activity-certificate {
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
    }

    .activity-payment {
        background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
    }

    .activity-profile {
        background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);
    }

    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .notification-item {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 0.5rem;
        border-left: 4px solid #ff6b6b;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .notification-item:hover {
        transform: translateX(5px);
    }

    .notification-unread {
        background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
    }

    .password-strength {
        height: 5px;
        border-radius: 3px;
        background: #e9ecef;
        overflow: hidden;
        margin-top: 0.5rem;
    }

    .password-strength-bar {
        height: 100%;
        transition: all 0.3s ease;
    }

    .strength-weak {
        background: #dc3545;
        width: 25%;
    }

    .strength-medium {
        background: #ffc107;
        width: 50%;
    }

    .strength-good {
        background: #fd7e14;
        width: 75%;
    }

    .strength-strong {
        background: #28a745;
        width: 100%;
    }

    .security-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .security-item:hover {
        border-color: #ff6b6b;
        transform: translateY(-3px);
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .floating-save {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
    }

    .floating-save.show {
        opacity: 1;
        transform: scale(1);
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 1.5rem;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
        }

        .page-header {
            padding: 2rem 0;
        }
    }
</style>
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-person-gear me-3"></i>প্রোফাইল ব্যবস্থাপনা
                </h1>
                <p class="lead mb-0">আপনার ব্যক্তিগত তথ্য এবং অ্যাকাউন্ট সেটিংস পরিচালনা করুন</p>
            </div>
            <div class="col-md-4 text-end">
                <div style="font-size: 5rem; opacity: 0.3;">👤</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Main Profile Section -->
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="profile-card animate-fade-in">
                <div class="section-header">
                    <div>
                        <h4 class="mb-0"><i class="bi bi-person me-2"></i>ব্যক্তিগত তথ্য</h4>
                    </div>
                    <button class="btn btn-edit" onclick="toggleEdit('basic-info')">
                        <i class="bi bi-pencil me-1"></i>সম্পাদনা
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="avatar-upload">
                            <img src="{{ $users->profile && $users->profile->photo_url ? $users->profile->photo_url : 'https://via.placeholder.com/150x150/667eea/ffffff?text=Profile' }}"
                                alt="Profile Picture" class="profile-avatar" id="profileAvatar">
                            <div class="avatar-overlay">
                                <i class="bi bi-camera text-white" style="font-size: 2rem;"></i>
                            </div>
                            <input type="file" id="avatarInput" class="d-none" accept="image/*">
                        </div>
                        <h5 class="mt-3 mb-1">{{ $users->profile->name_bn ?? $users->name ?? 'নাম নেই' }}</h5>
                        <p class="text-muted mb-0">{{ $users->role == 'admin' ? 'প্রশাসক' : 'সাধারণ ব্যবহারকারী' }}</p>
                    </div>

                    <div class="col-md-8">
                        <form id="basicInfoForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">পূর্ণ নাম (বাংলা) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $users->profile->name_bn ?? '' }}" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">পূর্ণ নাম (ইংরেজি) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $users->profile->name_en ?? $users->name ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">পিতার নাম <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $users->profile->father_name_bn ?? '' }}" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">মাতার নাম <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $users->profile->mother_name_bn ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">জন্ম তারিখ <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" value="{{ $users->profile->birth_date ? $users->profile->birth_date->format('Y-m-d') : ($users->date_of_birth ? $users->date_of_birth->format('Y-m-d') : '') }}" disabled>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">লিঙ্গ <span class="text-danger">*</span></label>
                                    <select class="form-select" disabled>
                                        <option value="male" {{ ($users->profile->gender ?? '') == 'male' ? 'selected' : '' }}>পুরুষ</option>
                                        <option value="female" {{ ($users->profile->gender ?? '') == 'female' ? 'selected' : '' }}>মহিলা</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">বৈবাহিক অবস্থা</label>
                                    <select class="form-select" disabled>
                                        <option value="married" {{ ($users->profile->marital_status ?? '') == 'married' ? 'selected' : '' }}>বিবাহিত</option>
                                        <option value="single" {{ ($users->profile->marital_status ?? '') == 'single' ? 'selected' : '' }}>অবিবাহিত</option>
                                        <option value="divorced" {{ ($users->profile->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>তালাকপ্রাপ্ত</option>
                                        <option value="widowed" {{ ($users->profile->marital_status ?? '') == 'widowed' ? 'selected' : '' }}>বিধবা/বিপত্নীক</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">জাতীয় পরিচয়পত্র নম্বর</label>
                                    <input type="text" class="form-control" value="{{ $users->nid ?? '' }}" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">জন্ম নিবন্ধন নম্বর</label>
                                    <input type="text" class="form-control" value="{{ $users->birth_num ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="edit-buttons d-none" id="basic-info-buttons">
                                <button type="button" class="btn btn-save me-2" onclick="saveSection('basic-info')">
                                    <i class="bi bi-check-circle me-2"></i>সংরক্ষণ করুন
                                </button>
                                <button type="button" class="btn btn-cancel" onclick="cancelEdit('basic-info')">
                                    <i class="bi bi-x-circle me-2"></i>বাতিল
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="profile-card animate-fade-in" style="animation-delay: 0.1s;">
                <div class="section-header">
                    <div>
                        <h4 class="mb-0"><i class="bi bi-telephone me-2"></i>যোগাযোগের তথ্য</h4>
                    </div>
                    <button class="btn btn-edit" onclick="toggleEdit('contact-info')">
                        <i class="bi bi-pencil me-1"></i>সম্পাদনা
                    </button>
                </div>

                <form id="contactInfoForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                <input type="tel" class="form-control" value="{{ $users->profile->mobile ?? $users->phone ?? '' }}" disabled>
                                <span class="input-group-text text-success"><i class="bi bi-check-circle-fill"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ইমেইল ঠিকানা</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" value="{{ $users->profile->email ?? $users->email ?? '' }}" disabled>
                                <span class="input-group-text text-warning"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            </div>
                            <small class="text-muted">ইমেইল যাচাই প্রয়োজন</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">বর্তমান ঠিকানা <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="3" disabled>{{ $users->profile ? $users->profile->current_address : '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">স্থায়ী ঠিকানা</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="sameAddress" {{ ($users->profile->same_as_current ?? false) ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="sameAddress">
                                বর্তমান ঠিকানার মতো
                            </label>
                        </div>
                        <textarea class="form-control" rows="3" disabled>{{ $users->profile ? (($users->profile->same_as_current ?? false) ? $users->profile->current_address : $users->profile->permanent_address) : '' }}</textarea>
                    </div>

                    <div class="edit-buttons d-none" id="contact-info-buttons">
                        <button type="button" class="btn btn-save me-2" onclick="saveSection('contact-info')">
                            <i class="bi bi-check-circle me-2"></i>সংরক্ষণ করুন
                        </button>
                        <button type="button" class="btn btn-cancel" onclick="cancelEdit('contact-info')">
                            <i class="bi bi-x-circle me-2"></i>বাতিল
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Settings -->
            <div class="profile-card animate-fade-in" style="animation-delay: 0.2s;">
                <div class="section-header">
                    <div>
                        <h4 class="mb-0"><i class="bi bi-shield-check me-2"></i>নিরাপত্তা সেটিংস</h4>
                    </div>
                </div>

                <!-- Password Change -->
                <div class="security-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="mb-1">পাসওয়ার্ড পরিবর্তন</h6>
                            <small class="text-muted">শেষ পরিবর্তন: ৫ দিন আগে</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                <i class="bi bi-key me-1"></i>পরিবর্তন করুন
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Two Factor Authentication -->
                <div class="security-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="mb-1">দ্বিখণ্ডিত যাচাইকরণ (২FA)</h6>
                            <small class="text-muted">আপনার অ্যাকাউন্টে অতিরিক্ত নিরাপত্তা</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Login Notifications -->
                <div class="security-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="mb-1">লগইন বিজ্ঞপ্তি</h6>
                            <small class="text-muted">নতুন ডিভাইস থেকে লগইনের সময় SMS পাবেন</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Session Management -->
                <div class="security-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="mb-1">সেশন ব্যবস্থাপনা</h6>
                            <small class="text-muted">সকল ডিভাইস থেকে লগআউট করুন</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn btn-outline-danger btn-sm" onclick="logoutAllDevices()">
                                <i class="bi bi-box-arrow-right me-1"></i>সব থেকে লগআউট
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Profile Stats -->
            <div class="profile-card animate-fade-in" style="animation-delay: 0.3s;">
                <div class="section-header">
                    <h5 class="mb-0"><i class="bi bi-graph-up me-2"></i>প্রোফাইল পরিসংখ্যান</h5>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">১২</div>
                            <h6 class="mb-0">মোট আবেদন</h6>
                            <small class="text-muted">সম্পন্ন</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">৩</div>
                            <h6 class="mb-0">অপেক্ষমাণ</h6>
                            <small class="text-muted">প্রক্রিয়াধীন</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">৮৫%</div>
                            <h6 class="mb-0">প্রোফাইল সম্পূর্ণতা</h6>
                            <small class="text-success">ভাল</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">২ বছর</div>
                            <h6 class="mb-0">সদস্যপদ</h6>
                            <small class="text-muted">যোগদান</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="profile-card animate-fade-in" style="animation-delay: 0.4s;">
                <div class="section-header">
                    <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>সাম্প্রতিক কার্যকলাপ</h5>
                </div>

                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="activity-icon activity-login me-3">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">সিস্টেমে লগইন</h6>
                            <small class="text-muted">২ ঘন্টা আগে</small>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="activity-icon activity-certificate me-3">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">জন্মনিবন্ধন সার্টিফিকেটের জন্য আবেদন</h6>
                            <small class="text-muted">১ দিন আগে</small>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="activity-icon activity-payment me-3">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">অনলাইন পেমেন্ট সম্পন্ন</h6>
                            <small class="text-muted">৩ দিন আগে</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection