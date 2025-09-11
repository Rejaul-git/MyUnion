@extends('layouts.user')
@section('title', 'ইউনিয়ন পরিষদ নাগরিক সেবা')
@section('content')


<!-- Main Content -->
<div class="">
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
</div>
@endsection