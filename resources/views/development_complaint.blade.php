@extends('layouts.app')
@section('title', 'উন্নয়ন প্রকল্প প্রতিক্রিয়া')

@section('content')
<style>
    /* body {
        font-family: 'Noto Sans Bengali', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px 0;
    } */

    .main-container {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .header-section {
        background: linear-gradient(45deg, #4a7c59, #4a7c59);
        color: white;
        padding: 40px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .header-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .header-section p {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .section-title {
        color: #2E8B57;
        font-weight: 700;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid #2E8B57;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        border-radius: 2px;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(45deg, #667eea, #764ba2);
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .category-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .btn-submit {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
        background: linear-gradient(45deg, #218838, #1ea082);
    }

    .status-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .status-progress {
        background: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .status-completed {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .complaint-item {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        border-left: 4px solid #667eea;
        transition: all 0.3s ease;
    }

    .complaint-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }

    .floating-elements {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .floating-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .floating-circle:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-circle:nth-child(2) {
        width: 120px;
        height: 120px;
        top: 70%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-circle:nth-child(3) {
        width: 60px;
        height: 60px;
        top: 40%;
        left: 80%;
        animation-delay: 4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @media (max-width: 768px) {
        .header-section h1 {
            font-size: 2rem;
        }

        .category-card {
            padding: 20px;
        }
    }
</style>

<div class="floating-elements">
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
</div>

<!-- Header Section -->
<div class="header-section main-container">
    <div class="container">
        <h1><i class="fas fa-building"></i> উন্নয়ন প্রকল্প</h1>
        <p>রাস্তা, ব্রিজ, পানি ও স্যানিটেশন সংক্রান্ত অভিযোগ ও প্রস্তাব</p>
    </div>
</div>
<div class="container">
    <div class="main-container">
        <div class="container py-5">
            <!-- Project Categories -->
            <div class="row mb-5">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="category-card text-center">
                        <i class="fas fa-road category-icon"></i>
                        <h5>রাস্তাঘাট</h5>
                        <p class="text-muted">রাস্তা নির্মাণ ও মেরামত</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="category-card text-center">
                        <i class="fas fa-bridge-water category-icon"></i>
                        <h5>সেতু ও কালভার্ট</h5>
                        <p class="text-muted">সেতু নির্মাণ ও রক্ষণাবেক্ষণ</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="category-card text-center">
                        <i class="fas fa-tint category-icon"></i>
                        <h5>পানি সরবরাহ</h5>
                        <p class="text-muted">নলকূপ ও পানির ব্যবস্থা</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="category-card text-center">
                        <i class="fas fa-toilet category-icon"></i>
                        <h5>স্যানিটেশন</h5>
                        <p class="text-muted">পয়ঃনিষ্কাশন ব্যবস্থা</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Complaint Form -->
                <div class="col-lg-6 mb-4">
                    <div class="category-card">
                        <h3 class="section-title"><i class="fas fa-edit"></i> অভিযোগ ও প্রস্তাব জমা দিন</h3>
                        <form id="complaintForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">নাম *</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">মোবাইল নম্বর *</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="village" class="form-label">গ্রাম/এলাকা</label>
                                <input type="text" class="form-control" id="village">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">প্রকল্পের ধরন *</label>
                                <select class="form-select" id="category" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="road">রাস্তাঘাট</option>
                                    <option value="bridge">সেতু ও কালভার্ট</option>
                                    <option value="water">পানি সরবরাহ</option>
                                    <option value="sanitation">স্যানিটেশন</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">ধরন *</label>
                                <select class="form-select" id="type" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="complaint">অভিযোগ</option>
                                    <option value="proposal">প্রস্তাব</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">বিস্তারিত বিবরণ *</label>
                                <textarea class="form-control" id="description" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">অগ্রাধিকার</label>
                                <select class="form-select" id="priority">
                                    <option value="low">নিম্ন</option>
                                    <option value="medium" selected>মাঝারি</option>
                                    <option value="high">উচ্চ</option>
                                    <option value="urgent">জরুরি</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-submit w-100">
                                <i class="fas fa-paper-plane"></i> জমা দিন
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Recent Complaints -->
                <div class="col-lg-6 mb-4">
                    <div class="category-card">
                        <h3 class="section-title"><i class="fas fa-list"></i> সাম্প্রতিক অভিযোগ ও প্রস্তাব</h3>
                        <div id="complaintsList">
                            <div class="complaint-item">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-warning">রাস্তাঘাট</span>
                                    <span class="status-badge status-progress">কার্যক্রমে</span>
                                </div>
                                <h6>মাধবপুর রাস্তা মেরামত</h6>
                                <p class="text-muted mb-2">বর্ষাকালে রাস্তায় পানি জমে যায় এবং চলাচলে অসুবিধা হয়।</p>
                                <small class="text-muted"><i class="fas fa-user"></i> মোঃ রহিম উদ্দিন | <i class="fas fa-calendar"></i> ১৫ সেপ্টেম্বর, ২০২৫</small>
                            </div>

                            <div class="complaint-item">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-info">পানি সরবরাহ</span>
                                    <span class="status-badge status-completed">সম্পন্ন</span>
                                </div>
                                <h6>নলকূপ স্থাপনের প্রস্তাব</h6>
                                <p class="text-muted mb-2">পশ্চিমপাড়া এলাকায় একটি নলকূপ স্থাপন করা প্রয়োজন।</p>
                                <small class="text-muted"><i class="fas fa-user"></i> ফাতেমা খাতুন | <i class="fas fa-calendar"></i> ১২ সেপ্টেম্বর, ২০২৫</small>
                            </div>

                            <div class="complaint-item">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-success">সেতু</span>
                                    <span class="status-badge status-pending">অপেক্ষমাণ</span>
                                </div>
                                <h6>কালভার্ট নির্মাণ</h6>
                                <p class="text-muted mb-2">বাজার এলাকায় একটি কালভার্ট নির্মাণ করা দরকার।</p>
                                <small class="text-muted"><i class="fas fa-user"></i> আব্দুল কাদের | <i class="fas fa-calendar"></i> ১০ সেপ্টেম্বর, ২০২৫</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Statistics -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="category-card">
                        <h3 class="section-title"><i class="fas fa-chart-bar"></i> প্রকল্পের পরিসংখ্যান</h3>
                        <div class="row text-center">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <h4 class="text-primary">১২৫</h4>
                                    <p class="mb-0">মোট প্রকল্প</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <h4 class="text-success">৮৯</h4>
                                    <p class="mb-0">সম্পূর্ণ প্রকল্প</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <h4 class="text-warning">২৮</h4>
                                    <p class="mb-0">চলমান প্রকল্প</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <h4 class="text-danger">৮</h4>
                                    <p class="mb-0">অপেক্ষমাণ প্রকল্প</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('complaintForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Get form data
        const name = document.getElementById('name').value;
        const phone = document.getElementById('phone').value;
        const village = document.getElementById('village').value;
        const category = document.getElementById('category').value;
        const type = document.getElementById('type').value;
        const description = document.getElementById('description').value;
        const priority = document.getElementById('priority').value;

        // Create new complaint item
        const complaintsList = document.getElementById('complaintsList');
        const newComplaint = document.createElement('div');
        newComplaint.className = 'complaint-item';

        const categoryNames = {
            'road': 'রাস্তাঘাট',
            'bridge': 'সেতু ও কালভার্ট',
            'water': 'পানি সরবরাহ',
            'sanitation': 'স্যানিটেশন'
        };

        const typeNames = {
            'complaint': 'অভিযোগ',
            'proposal': 'প্রস্তাব'
        };

        const categoryColors = {
            'road': 'bg-warning',
            'bridge': 'bg-success',
            'water': 'bg-info',
            'sanitation': 'bg-secondary'
        };

        const today = new Date();
        const dateStr = today.toLocaleDateString('bn-BD');

        newComplaint.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="badge ${categoryColors[category]}">${categoryNames[category]}</span>
                    <span class="status-badge status-pending">অপেক্ষমাণ</span>
                </div>
                <h6>${typeNames[type]} - ${categoryNames[category]}</h6>
                <p class="text-muted mb-2">${description.substring(0, 100)}${description.length > 100 ? '...' : ''}</p>
                <small class="text-muted">
                    <i class="fas fa-user"></i> ${name} | 
                    <i class="fas fa-calendar"></i> ${dateStr}
                    ${village ? ` | <i class="fas fa-map-marker-alt"></i> ${village}` : ''}
                </small>
            `;

        // Add to top of list
        complaintsList.insertBefore(newComplaint, complaintsList.firstChild);

        // Show success message
        alert('আপনার অভিযোগ/প্রস্তাব সফলভাবে জমা হয়েছে! আমরা শীঘ্রই এটি পর্যালোচনা করব।');

        // Reset form
        this.reset();

        // Add animation to new item
        newComplaint.style.opacity = '0';
        newComplaint.style.transform = 'translateX(-20px)';
        setTimeout(() => {
            newComplaint.style.transition = 'all 0.5s ease';
            newComplaint.style.opacity = '1';
            newComplaint.style.transform = 'translateX(0)';
        }, 100);
    });

    // Add some interactive effects
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>

@endsection