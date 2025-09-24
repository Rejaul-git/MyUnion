@extends('layouts.user')
@section('title', 'ইউনিয়ন পরিষদ নাগরিক সেবা')
@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #7cb342 0%, #34495e 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .dashboard-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #7cb342 0%, #7cb342 100%);
        color: white;
        border-radius: 10px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        border-radius: 25px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(40, 167, 69, 0.4);
    }

    .btn-secondary-custom {
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
        border: none;
        border-radius: 25px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
    }

    .tax-rate-table {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 1rem;
    }

    .amount-highlight {
        background: linear-gradient(135deg, #7cb342 0%, #7cb342 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        display: inline-block;
    }

    .status-paid {
        background: #28a745;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    .status-pending {
        background: #ffc107;
        color: #212529;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    .status-overdue {
        background: #dc3545;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    .modal-content {
        border-radius: 15px;
    }

    .modal-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        border-radius: 15px 15px 0 0;
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
        border-color: #ff6b6b;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
    }

    .form-check-input:checked {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    .info-box {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border: 1px solid #b8daff;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-in;
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

    @media (max-width: 768px) {
        .dashboard-card {
            padding: 1rem;
        }

        .card-header-custom {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
    }
</style>
<!-- </head>

<body> -->
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">কর ও পেমেন্ট ড্যাশবোর্ড</h1>
                <p class="lead mb-0">হোল্ডিং ট্যাক্স এবং পেমেন্ট ব্যবস্থাপনা</p>
            </div>
            <div class="col-md-4 text-end">
                <div style="font-size: 4rem; opacity: 0.3;">💰</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Tax Overview -->
    <div class="dashboard-card animate-fade-in">
        <div class="card-header-custom">
            <div>
                <h3 class="mb-0"><i class="bi bi-calculator me-2"></i>কর ব্যবস্থাপনা</h3>
            </div>
            @if(!$hasHoldingNumber)
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#holdingModal">
                <i class="bi bi-plus-circle me-2"></i>হোল্ডিং নম্বর নিতে ক্লিক করুন
            </button>
            @else
            <a href="{{ route('tax.payment.form') }}" class="btn btn-light">
                <i class="bi bi-credit-card me-2"></i>ট্যাক্স পরিশোধ করুন
            </a>
            @endif
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="text-center p-3 bg-light rounded">
                    <h5>বার্ষিক কর</h5>
                    <span class="amount-highlight">
                        @php
                        $currentYear = date('Y');
                        $annualTax = $taxPayments->where('created_at', '>=', $currentYear . '-01-01')->where('created_at', '<=', $currentYear . '-12-31' )->sum('tax_amount');
                            @endphp
                            {{ number_format($annualTax) }} টাকা
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3 bg-light rounded">
                    <h5>বকেয়া কর</h5>
                    <span class="amount-highlight">
                        @php
                        $paidTax = $taxPayments->where('payment_status', 'paid')->sum('tax_amount');
                        $totalTax = $taxPayments->sum('tax_amount');
                        $dueTax = $totalTax - $paidTax;
                        @endphp
                        {{ number_format($dueTax) }} টাকা
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-3 bg-light rounded">
                    <h5>মোট পরিশোধিত</h5>
                    <span class="amount-highlight">{{ number_format($paidTax) }} টাকা</span>
                </div>
            </div>
        </div>

        <!-- Tax Rate Information -->
        <div class="tax-rate-table">
            <h5 class="mb-3"><i class="bi bi-info-circle me-2"></i>বার্ষিক কর হারের তালিকা</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>জমির পরিমাণ</th>
                            <th>বার্ষিক কর (টাকা)</th>
                            <th>প্রযোজ্য ক্ষেত্র</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>১-৫ শতাংশ</td>
                            <td>২,০০০</td>
                            <td>বসতবাড়ি</td>
                        </tr>
                        <tr>
                            <td>৬-১০ শতাংশ</td>
                            <td>৩,৫০০</td>
                            <td>বসতবাড়ি</td>
                        </tr>
                        <tr>
                            <td>১১-২০ শতাংশ</td>
                            <td>৫,০০০</td>
                            <td>বসতবাড়ি/ব্যবসায়িক</td>
                        </tr>
                        <tr>
                            <td>২০+ শতাংশ</td>
                            <td>৮,০০০</td>
                            <td>ব্যবসায়িক/মিশ্র</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tax Actions -->
    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-card animate-fade-in">
                <div class="text-center">
                    <div class="mb-3" style="font-size: 3rem; color: #28a745;">💳</div>
                    <h5>হোল্ডিং ট্যাক্স পরিশোধ</h5>
                    <p class="text-muted">অনলাইনে হোল্ডিং ট্যাক্স পরিশোধ করুন</p>
                    @if($hasHoldingNumber)
                    <a href="{{ route('tax.payment.form') }}" class="btn btn-primary-custom">
                        <i class="bi bi-credit-card me-2"></i>ট্যাক্স পরিশোধ করুন
                    </a>
                    @else
                    <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#holdingModal">
                        <i class="bi bi-plus-circle me-2"></i>হোল্ডিং নম্বর নিতে ক্লিক করুন
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card animate-fade-in">
                <div class="text-center">
                    <div class="mb-3" style="font-size: 3rem; color: #6c5ce7;">📋</div>
                    <h5>ট্যাক্সের ইতিহাস</h5>
                    <p class="text-muted">আগের সব ট্যাক্স পেমেন্ট দেখুন</p>
                    <button class="btn btn-secondary-custom" data-bs-toggle="modal" data-bs-target="#taxHistoryModal">
                        <i class="bi bi-clock-history me-2"></i>ইতিহাস দেখুন
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card animate-fade-in">
                <div class="text-center">
                    <div class="mb-3" style="font-size: 3rem; color: #ff6b6b;">⚠️</div>
                    <h5>বকেয়া কর</h5>
                    <p class="text-muted">অপরিশোধিত কর দেখুন</p>
                    <button class="btn btn-secondary-custom" data-bs-toggle="modal" data-bs-target="#pendingDuesModal">
                        <i class="bi bi-exclamation-triangle me-2"></i>বকেয়া দেখুন
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Section -->
    <div class="dashboard-card animate-fade-in">
        <div class="card-header-custom">
            <h3 class="mb-0"><i class="bi bi-wallet me-2"></i>পেমেন্ট ব্যবস্থাপনা</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <h5><i class="bi bi-clock-history me-2"></i>সাম্প্রতিক পেমেন্ট</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>ট্রানজেকশন ID</th>
                                    <th>পরিমাণ</th>
                                    <th>স্ট্যাটাস</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($taxPayments as $payment)
                                <tr>
                                    <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                    <td>TAX{{ $payment->id }}</td>
                                    <td>{{ number_format($payment->tax_amount) }} টাকা</td>
                                    <td>
                                        @if($payment->payment_status == 'paid')
                                        <span class="status-paid">পরিশোধিত</span>
                                        @else
                                        <span class="status-pending">অপেক্ষমাণ</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">কোন পেমেন্ট ইতিহাস নেই</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-4">
                    <h5><i class="bi bi-download me-2"></i>সার্টিফিকেট/রসিদ</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('tax.invoice.download', 1) }}" class="btn btn-outline-success">
                            <i class="bi bi-file-earmark-arrow-down me-2"></i>রসিদ ডাউনলোড - ৫,০০০ টাকা
                        </a>
                        <a href="{{ route('tax.invoice.download', 2) }}" class="btn btn-outline-primary">
                            <i class="bi bi-file-earmark-arrow-down me-2"></i>রসিদ ডাউনলোড - ২,৫০০ টাকা
                        </a>
                        <a href="{{ route('tax.invoice.download', 3) }}" class="btn btn-outline-info">
                            <i class="bi bi-file-earmark-arrow-down me-2"></i>রসিদ ডাউনলোড - ৭,৫০০ টাকা
                        </a>
                        <button class="btn btn-primary-custom mt-3" data-bs-toggle="modal" data-bs-target="#paymentHistoryModal">
                            <i class="bi bi-list-ul me-2"></i>সম্পূর্ণ পেমেন্ট ইতিহাস দেখুন
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Holding Number Modal -->
<div class="modal fade" id="holdingModal" tabindex="-1" aria-labelledby="holdingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="holdingModalLabel">
                    <i class="bi bi-house me-2"></i>হোল্ডিং নম্বরের জন্য আবেদন
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tax.holding.number.store') }}">
                    @csrf
                    <div class="info-box">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>বিশেষ দ্রষ্টব্য:</strong> সঠিক তথ্য প্রদান করুন। ভুল তথ্যের জন্য আবেদন বাতিল হতে পারে।
                    </div>
                    <div class="mb-3">
                        <label class="form-label">হোল্ডিং নম্বর <span class="text-danger">*</span></label>
                        <input type="text" name="holding_number" class="form-control" placeholder="হোল্ডিং নম্বর লিখুন" required>
                    </div>

                    <h6 class="mb-3 text-primary"><i class="bi bi-building me-2"></i>সম্পত্তির তথ্য</h6>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">জমির খতিয়ান নম্বর <span class="text-danger">*</span></label>
                            <input type="text" name="land_khatian" class="form-control" placeholder="খতিয়ান নম্বর লিখুন" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">দাগ নম্বর <span class="text-danger">*</span></label>
                            <input type="text" name="dag_number" class="form-control" placeholder="দাগ নম্বর লিখুন" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">জমির পরিমাণ (শতাংশে) <span class="text-danger">*</span></label>
                        <input type="number" name="land_amount" class="form-control" placeholder="উদাহরণ: ৫.৫" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">বাড়ি/স্থাপনার ধরন <span class="text-danger">*</span></label>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="property_type" id="residential" value="residential" required>
                                    <label class="form-check-label" for="residential">
                                        বসতবাড়ি
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="property_type" id="commercial" value="commercial" required>
                                    <label class="form-check-label" for="commercial">
                                        ব্যবসায়িক প্রতিষ্ঠান
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="property_type" id="mixed" value="mixed" required>
                                    <label class="form-check-label" for="mixed">
                                        মিশ্র ব্যবহার
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">কক্ষ সংখ্যা</label>
                            <input type="number" name="room_count" class="form-control" placeholder="কক্ষ সংখ্যা" min="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">তলা সংখ্যা</label>
                            <input type="number" name="floor_count" class="form-control" placeholder="তলা সংখ্যা" min="1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">বিদ্যমান হোল্ডিং নম্বর (যদি থাকে)</label>
                        <input type="text" name="existing_holding_number" class="form-control" placeholder="পূর্বের হোল্ডিং নম্বর (থাকলে)">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">আবেদনকারীর নাম <span class="text-danger">*</span></label>
                            <input type="text" name="applicant_name" class="form-control" placeholder="পূর্ণ নাম" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="tel" name="mobile_number" class="form-control" placeholder="01XXXXXXXXX" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">বর্তমান ঠিকানা <span class="text-danger">*</span></label>
                        <textarea name="current_address" class="form-control" rows="3" placeholder="সম্পূর্ণ ঠিকানা লিখুন" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-send me-2"></i>আবেদন জমা দিন
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tax History Modal -->
<div class="modal fade" id="taxHistoryModal" tabindex="-1" aria-labelledby="taxHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taxHistoryModalLabel">
                    <i class="bi bi-clock-history me-2"></i>ট্যাক্স পেমেন্ট ইতিহাস
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>সাল</th>
                                <th>কর পরিমাণ</th>
                                <th>পরিশোধ তারিখ</th>
                                <th>ট্রানজেকশন ID</th>
                                <th>স্ট্যাটাস</th>
                                <th>রসিদ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($taxPayments as $payment)
                            <tr>
                                <td>{{ $payment->created_at->format('Y') }}</td>
                                <td>{{ number_format($payment->tax_amount) }} টাকা</td>
                                <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                <td>TAX{{ $payment->id }}</td>
                                <td>
                                    @if($payment->payment_status == 'paid')
                                    <span class="status-paid">পরিশোধিত</span>
                                    @else
                                    <span class="status-pending">অপেক্ষমাণ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($payment->payment_status == 'paid')
                                    <a href="{{ route('tax.invoice.download', $payment->id) }}" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">কোন ট্যাক্স ইতিহাস নেই</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Dues Modal -->
<div class="modal fade" id="pendingDuesModal" tabindex="-1" aria-labelledby="pendingDuesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendingDuesModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>বকেয়া কর
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>সতর্কতা:</strong> বকেয়া কর যত তাড়াতাড়ি সম্ভব পরিশোধ করুন। বিলম্বে জরিমানা যোগ হতে পারে।
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-danger">
                            <tr>
                                <th>বছর</th>
                                <th>মূল কর</th>
                                <th>জরিমানা</th>
                                <th>মোট বকেয়া</th>
                                <th>বিলম্ব (দিন)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalDue = 0;
                            @endphp
                            @forelse($taxPayments->where('payment_status', '!=', 'paid') as $payment)
                            @php
                            $dueAmount = $payment->tax_amount;
                            $penalty = $dueAmount * 0.2; // 20% penalty
                            $totalDue += $dueAmount + $penalty;
                            $daysOverdue = now()->diffInDays($payment->created_at, false);
                            @endphp
                            <tr>
                                <td>{{ $payment->created_at->format('Y') }}</td>
                                <td>{{ number_format($dueAmount) }} টাকা</td>
                                <td>{{ number_format($penalty) }} টাকা</td>
                                <td class="fw-bold text-danger">{{ number_format($dueAmount + $penalty) }} টাকা</td>
                                <td>{{ abs($daysOverdue) }} দিন</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">কোন বকেয়া নেই</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <th colspan="3">মোট বকেয়া:</th>
                                <th class="text-warning">{{ number_format($totalDue) }} টাকা</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-center mt-4">
                    @php
                    $totalDue = 0;
                    foreach($taxPayments->where('payment_status', '!=', 'paid') as $payment) {
                    $dueAmount = $payment->tax_amount;
                    $penalty = $dueAmount * 0.2; // 20% penalty
                    $totalDue += $dueAmount + $penalty;
                    }
                    @endphp
                    @if($totalDue > 0)
                    <a href="{{ route('tax.payment.form') }}" class="btn btn-primary-custom btn-lg">
                        <i class="bi bi-credit-card me-2"></i>সমস্ত বকেয়া পরিশোধ করুন ({{ number_format($totalDue) }} টাকা)
                    </a>
                    @else
                    <p class="text-success">অভিনন্দন! আপনার কোন বকেয়া নেই।</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment History Modal -->
<div class="modal fade" id="paymentHistoryModal" tabindex="-1" aria-labelledby="paymentHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentHistoryModalLabel">
                    <i class="bi bi-list-ul me-2"></i>সম্পূর্ণ পেমেন্ট ইতিহাস
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>সব বছর</option>
                            <option>২০২৤</option>
                            <option>২০২৩</option>
                            <option>২০২২</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>সব স্ট্যাটাস</option>
                            <option>পরিশোধিত</option>
                            <option>অপেক্ষমাণ</option>
                            <option>বাতিল</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="search" class="form-control" placeholder="ট্রানজেকশন ID খুঁজুন">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>তারিখ</th>
                                <th>বিবরণ</th>
                                <th>ট্রানজেকশন ID</th>
                                <th>পদ্ধতি</th>
                                <th>পরিমাণ</th>
                                <th>স্ট্যাটাস</th>
                                <th>রসিদ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($taxPayments as $payment)
                            <tr>
                                <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                <td>{{ $payment->created_at->format('Y') }} সালের হোল্ডিং ট্যাক্স</td>
                                <td>TAX{{ $payment->id }}</td>
                                <td>অনলাইন</td>
                                <td>{{ number_format($payment->tax_amount) }} টাকা</td>
                                <td>
                                    @if($payment->payment_status == 'paid')
                                    <span class="status-paid">পরিশোধিত</span>
                                    @else
                                    <span class="status-pending">অপেক্ষমাণ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($payment->payment_status == 'paid')
                                    <a href="{{ route('tax.invoice.download', $payment->id) }}" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">কোন পেমেন্ট ইতিহাস নেই</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">পূর্ববর্তী</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">১</a></li>
                        <li class="page-item"><a class="page-link" href="#">২</a></li>
                        <li class="page-item"><a class="page-link" href="#">৩</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">পরবর্তী</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Function to submit holding application
    function submitHoldingApplication() {
        // Form validation
        const form = document.querySelector('#holdingModal form');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Show loading state
        const submitBtn = event.target;
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="bi bi-spinner-border me-2"></i>প্রক্রিয়াধীন...';
        submitBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            alert('আবেদন সফলভাবে জমা দেওয়া হয়েছে! আপনার আবেদন নম্বর: APP2024001234');

            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('holdingModal'));
            modal.hide();

            // Reset form
            form.reset();
        }, 2000);
    }


    // Function to pay all dues
    function payAllDues() {
        if (confirm('আপনি কি নিশ্চিত যে ৮,৪০০ টাকা পরিশোধ করতে চান?')) {
            alert('পেমেন্ট পেজে রিডাইরেক্ট করা হচ্ছে...');
            // In real app, redirect to payment gateway
            window.location.href = '#payment-gateway';
        }
    }

    // Function to redirect to tax payment page
    document.querySelector('[onclick="location.href=\'#payTax\'"]').onclick = function() {
        alert('হোল্ডিং ট্যাক্স পেমেন্ট পেজে রিডাইরেক্ট করা হচ্ছে...');
        // In real app, redirect to payment page
        window.location.href = '#tax-payment-page';
    };

    // Add animation to cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeIn 0.6s ease-in forwards';
            }
        });
    }, observerOptions);

    // Observe all dashboard cards
    document.querySelectorAll('.dashboard-card').forEach(card => {
        observer.observe(card);
    });

    // Real-time tax calculation based on land size
    function calculateTax() {
        const landSize = document.querySelector('input[placeholder="উদাহরণ: ৫.৫"]');
        const propertyType = document.querySelector('input[name="propertyType"]:checked');

        if (landSize && landSize.value && propertyType) {
            const size = parseFloat(landSize.value);
            const type = propertyType.value;

            let taxAmount = 0;

            if (type === 'residential') {
                if (size <= 5) taxAmount = 2000;
                else if (size <= 10) taxAmount = 3500;
                else if (size <= 20) taxAmount = 5000;
                else taxAmount = 8000;
            } else if (type === 'commercial') {
                if (size <= 5) taxAmount = 4000;
                else if (size <= 10) taxAmount = 6000;
                else if (size <= 20) taxAmount = 8000;
                else taxAmount = 12000;
            } else if (type === 'mixed') {
                if (size <= 5) taxAmount = 3000;
                else if (size <= 10) taxAmount = 5000;
                else if (size <= 20) taxAmount = 7000;
                else taxAmount = 10000;
            }

            // Show calculated tax (in real app, this would update a display element)
            console.log(`Calculated tax: ${taxAmount} Taka`);
        }
    }

    // Add event listeners for tax calculation
    document.addEventListener('DOMContentLoaded', function() {
        const landSizeInput = document.querySelector('input[placeholder="উদাহরণ: ৫.৫"]');
        const propertyTypeInputs = document.querySelectorAll('input[name="propertyType"]');

        if (landSizeInput) {
            landSizeInput.addEventListener('input', calculateTax);
        }

        propertyTypeInputs.forEach(input => {
            input.addEventListener('change', calculateTax);
        });
    });

    // Mobile number validation
    function validateMobileNumber(input) {
        const value = input.value;
        const pattern = /^01[3-9]\d{8}$/;

        if (value && !pattern.test(value)) {
            input.setCustomValidity('সঠিক মোবাইল নম্বর লিখুন (উদাহরণ: ০১৭১২৩৪৫৬৭৮)');
        } else {
            input.setCustomValidity('');
        }
    }

    // Add mobile validation on page load
    document.addEventListener('DOMContentLoaded', function() {
        const mobileInput = document.querySelector('input[placeholder="01XXXXXXXXX"]');
        if (mobileInput) {
            mobileInput.addEventListener('input', function() {
                validateMobileNumber(this);
            });
        }
    });
</script>
<!-- </body>

</html> -->

@endsection