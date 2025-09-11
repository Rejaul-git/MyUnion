@extends('layouts.user')
@section('title', 'আপনার প্রোফাইল সম্পূর্ণ করুন')
@section('content')
<style>
    .form-container {
        background: white;

        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1200px;
        margin: 0 auto;
    }

    .progress-header {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }

    .progress-header h2 {
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .progress-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .progress-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: conic-gradient(#ffffff 0deg,
                #ffffff var(--progress),
                rgba(255, 255, 255, 0.3) var(--progress),
                rgba(255, 255, 255, 0.3) 360deg);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .progress-circle::before {
        content: '';
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #8bc34a;
        position: absolute;
    }

    .progress-text {
        position: relative;
        z-index: 1;
        font-size: 1.2rem;
        font-weight: 700;
        color: white;
    }

    .progress-steps {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .progress-step {
        text-align: center;
        opacity: 0.7;
    }

    .progress-step.completed {
        opacity: 1;
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.5rem;
        font-weight: 600;
    }

    .step-number.completed {
        background: white;
        color: #8bc34a;
    }

    .form-content {
        padding: 2rem;
    }

    .section-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-left: 5px solid #8bc34a;
        padding: 1rem 1.5rem;
        margin: 2rem 0 1.5rem;
        border-radius: 0 10px 10px 0;
    }

    .section-header h4 {
        margin: 0;
        color: #333;
        font-weight: 600;
    }

    .section-header .section-icon {
        color: #8bc34a;
        margin-right: 0.5rem;
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .required {
        color: #dc3545;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #8bc34a;
        box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, 0.25);
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group-text {
        background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
        color: white;
        border: none;
        border-radius: 10px 0 0 10px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #8e44ad 0%, #7d3c98 100%);
        border: none;
        border-radius: 25px;
        padding: 1rem 3rem;
        font-weight: 600;
        color: white;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(142, 68, 173, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 25px rgba(142, 68, 173, 0.4);
    }

    .checkbox-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .checkbox-custom input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #8bc34a;
    }

    .alert-info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border: 1px solid #b8daff;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .file-upload-area {
        border: 2px dashed #8bc34a;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        background: #f8fff8;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        background: #f0fff0;
        border-color: #689f38;
    }

    .file-upload-icon {
        font-size: 3rem;
        color: #8bc34a;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .form-content {
            padding: 1rem;
        }

        .progress-steps {
            gap: 1rem;
        }

        .progress-steps span {
            font-size: 0.8rem;
        }
    }

    .animate-fade-in {
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
</style>



<div class="container">
    <div class="form-container animate-fade-in">
        <!-- Progress Header -->
        <div class="progress-header">
            <h2><i class="bi bi-person-check me-2"></i>আপনার প্রোফাইল সম্পূর্ণ করুন</h2>

            <div class="progress-container">
                <div class="progress-circle" style="--progress: 180deg;" id="progressCircle">
                    <span class="progress-text" id="progressText">50%</span>
                </div>
            </div>

            <div class="progress-steps">
                <div class="progress-step completed">
                    <div class="step-number completed">✓</div>
                    <span>সাধারণ তথ্য</span>
                </div>
                <div class="progress-step completed">
                    <div class="step-number completed">✓</div>
                    <span>যোগাযোগ তথ্য</span>
                </div>
                <div class="progress-step">
                    <div class="step-number">3</div>
                    <span>বর্তমান ঠিকানা</span>
                </div>
                <div class="progress-step">
                    <div class="step-number">4</div>
                    <span>স্থায়ী ঠিকানা</span>
                </div>
                <div class="progress-step">
                    <div class="step-number">5</div>
                    <span>সম্পূর্ণ</span>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="form-content">
            <form id="profileForm" onsubmit="submitForm(event)">

                <!-- General Information Section -->
                <div class="section-header">
                    <h4><i class="bi bi-person section-icon"></i>সাধারণ তথ্য</h4>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="উদাহরণ: Abdul Karim" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="উদাহরণ: আবদুল করিম" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পিতার নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Father's name in English" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পিতার নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="পিতার নাম বাংলায়" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মাতার নাম (ইংরেজিতে) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Mother's name in English" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">মাতার নাম (বাংলায়) <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="মাতার নাম বাংলায়" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">স্বামী/স্ত্রীর নাম (ইংরেজিতে)</label>
                        <input type="text" class="form-control" placeholder="Spouse name in English">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">স্বামী/স্ত্রীর নাম (বাংলায়)</label>
                        <input type="text" class="form-control" placeholder="স্বামী/স্ত্রীর নাম বাংলায়">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">ইমেইল</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">মোবাইল নম্বর <span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" class="form-control" placeholder="01712345678" required>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">জন্ম তারিখ <span class="required">*</span></label>
                        <input type="date" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">লিঙ্গ <span class="required">*</span></label>
                        <select class="form-select" required>
                            <option value="">লিঙ্গ নির্বাচন করুন</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="other">অন্যান্য</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">বৈবাহিক অবস্থা</label>
                        <select class="form-select">
                            <option value="">বৈবাহিক অবস্থা নির্বাচন করুন</option>
                            <option value="single">অবিবাহিত</option>
                            <option value="married">বিবাহিত</option>
                            <option value="divorced">তালাকপ্রাপ্ত</option>
                            <option value="widowed">বিধবা/বিপত্নীক</option>
                        </select>
                    </div>
                </div>

                <!-- Current Address Section -->
                <div class="section-header">
                    <h4><i class="bi bi-geo-alt section-icon"></i>বর্তমান ঠিকানা</h4>
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>তথ্য:</strong> আপনার বর্তমান যে ঠিকানায় বসবাস করছেন সেই সম্পূর্ণ ঠিকানা দিন।
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">বিভাগ <span class="required">*</span></label>
                        <select class="form-select" id="currentDivision" onchange="loadCurrentDistricts()" required>
                            <option value="">বিভাগ নির্বাচন করুন</option>
                            <option value="dhaka">ঢাকা</option>
                            <option value="chittagong">চট্টগ্রাম</option>
                            <option value="rajshahi">রাজশাহী</option>
                            <option value="khulna">খুলনা</option>
                            <option value="barisal">বরিশাল</option>
                            <option value="sylhet">সিলেট</option>
                            <option value="rangpur">রংপুর</option>
                            <option value="mymensingh">ময়মনসিংহ</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">জেলা <span class="required">*</span></label>
                        <select class="form-select" id="currentDistrict" onchange="loadCurrentUpazilas()" required>
                            <option value="">প্রথমে বিভাগ নির্বাচন করুন</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">উপজেলা/থানা <span class="required">*</span></label>
                        <select class="form-select" id="currentUpazila" onchange="loadCurrentUnions()" required>
                            <option value="">প্রথমে জেলা নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ইউনিয়ন/পৌরসভা <span class="required">*</span></label>
                        <select class="form-select" id="currentUnion" required>
                            <option value="">প্রথমে উপজেলা নির্বাচন করুন</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">ওয়ার্ড নং <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="উদাহরণ: ০৫" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">গ্রাম/এলাকা <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="গ্রাম বা এলাকার নাম" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">ডাকঘর</label>
                        <input type="text" class="form-control" placeholder="ডাকঘরের নাম">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">পোস্ট কোড</label>
                        <input type="text" class="form-control" placeholder="উদাহরণ: ১২০০">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">সম্পূর্ণ ঠিকানা <span class="required">*</span></label>
                        <textarea class="form-control" rows="2" placeholder="বাড়ি নং, রাস্তা, গ্রাম/এলাকা সহ সম্পূর্ণ ঠিকানা" required></textarea>
                    </div>
                </div>

                <!-- Permanent Address Section -->
                <div class="section-header">
                    <h4><i class="bi bi-house section-icon"></i>স্থায়ী ঠিকানা</h4>
                </div>

                <div class="checkbox-custom">
                    <input type="checkbox" id="sameAddress" onchange="toggleSameAddress()">
                    <label for="sameAddress">বর্তমান ঠিকানার সাথে একই</label>
                </div>

                <div id="permanentAddressSection">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">বিভাগ <span class="required">*</span></label>
                            <select class="form-select" id="permanentDivision" onchange="loadPermanentDistricts()" required>
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                <option value="dhaka">ঢাকা</option>
                                <option value="chittagong">চট্টগ্রাম</option>
                                <option value="rajshahi">রাজশাহী</option>
                                <option value="khulna">খুলনা</option>
                                <option value="barisal">বরিশাল</option>
                                <option value="sylhet">সিলেট</option>
                                <option value="rangpur">রংপুর</option>
                                <option value="mymensingh">ময়মনসিংহ</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">জেলা <span class="required">*</span></label>
                            <select class="form-select" id="permanentDistrict" onchange="loadPermanentUpazilas()" required>
                                <option value="">প্রথমে বিভাগ নির্বাচন করুন</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">উপজেলা/থানা <span class="required">*</span></label>
                            <select class="form-select" id="permanentUpazila" onchange="loadPermanentUnions()" required>
                                <option value="">প্রথমে জেলা নির্বাচন করুন</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ইউনিয়ন/পৌরসভা <span class="required">*</span></label>
                            <select class="form-select" id="permanentUnion" required>
                                <option value="">প্রথমে উপজেলা নির্বাচন করুন</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">ওয়ার্ড নং <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="উদাহরণ: ০৫" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">গ্রাম/এলাকা <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="গ্রাম বা এলাকার নাম" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">ডাকঘর</label>
                            <input type="text" class="form-control" placeholder="ডাকঘরের নাম">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">পোস্ট কোড</label>
                            <input type="text" class="form-control" placeholder="উদাহরণ: ১২০০">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">সম্পূর্ণ ঠিকানা <span class="required">*</span></label>
                            <textarea class="form-control" rows="2" placeholder="বাড়ি নং, রাস্তা, গ্রাম/এলাকা সহ সম্পূর্ণ ঠিকানা" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Document Upload Section -->
                <div class="section-header">
                    <h4><i class="bi bi-file-earmark-arrow-up section-icon"></i>নথিপত্র আপলোড</h4>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">পাসপোর্ট সাইজের ছবি <span class="required">*</span></label>
                        <div class="file-upload-area" onclick="document.getElementById('photoUpload').click()">
                            <div class="file-upload-icon">
                                <i class="bi bi-camera"></i>
                            </div>
                            <p>ছবি আপলোড করতে ক্লিক করুন</p>
                            <small class="text-muted">JPG, PNG ফরম্যাট, সর্বোচ্চ ২MB</small>
                            <input type="file" id="photoUpload" accept="image/*" style="display: none;" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">NID/জন্ম নিবন্ধন সনদ <span class="required">*</span></label>
                        <div class="file-upload-area" onclick="document.getElementById('nidUpload').click()">
                            <div class="file-upload-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <p>ডকুমেন্ট আপলোড করতে ক্লিক করুন</p>
                            <small class="text-muted">JPG, PNG, PDF ফরম্যাট, সর্বোচ্চ ৫MB</small>
                            <input type="file" id="nidUpload" accept="image/*,.pdf" style="display: none;" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-submit">
                        <i class="bi bi-check-circle me-2"></i>
                        প্রোফাইল সম্পূর্ণ করুন
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<script>
    // Location data
    const locationData = {
        dhaka: {
            name: 'ঢাকা',
            districts: {
                dhaka: {
                    name: 'ঢাকা',
                    upazilas: ['ধামরাই', 'দোহার', 'কেরানীগঞ্জ', 'নবাবগঞ্জ', 'সাভার']
                },
                faridpur: {
                    name: 'ফরিদপুর',
                    upazilas: ['ভাঙ্গা', 'বোয়ালমারী', 'চরভদ্রাসন', 'ফরিদপুর সদর', 'কোটালীপাড়া']
                },
                gazipur: {
                    name: 'গাজীপুর',
                    upazilas: ['গাজীপুর সদর', 'কালিয়াকৈর', 'কাপাসি', 'মাঙ্গলবাড়ী']
                },

            }

        }
    };

    const districtSelect = document.getElementById('district');
    const upazilaSelect = document.getElementById('upazila');

    // Populate district options
    for (const district in locationData.dhaka.districts) {
        const option = document.createElement('option');
        option.value = district;
        option.textContent = locationData.dhaka.districts[district].name;
        districtSelect.appendChild(option);
    }

    // Populate upazila options
    districtSelect.addEventListener('change', () => {
        upazilaSelect.innerHTML = '';
        const selectedDistrict = locationData.dhaka.districts[districtSelect.value];
        for (const upazila of selectedDistrict.upazilas) {
            const option = document.createElement('option');
            option.value = upazila;
            option.textContent = upazila;
            upazilaSelect.appendChild(option);
        }
    });
</script>




@endsection