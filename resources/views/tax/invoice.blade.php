<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ট্যাক্স রসিদ - {{ $taxPayment->id }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Bengali', Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .invoice-header {
            text-align: center;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .invoice-title {
            color: #2c5530;
            font-weight: bold;
        }
        
        .invoice-details {
            margin-bottom: 30px;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: bold;
            width: 200px;
        }
        
        .detail-value {
            flex: 1;
        }
        
        .amount-section {
            background: #e8f5e8;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .amount-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .total-amount {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c5530;
        }
        
        .print-btn {
            text-align: center;
            margin-top: 30px;
        }
        
        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .invoice-container {
                box-shadow: none;
                padding: 20px;
            }
            
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1 class="invoice-title">ইউনিয়ন পরিষদ নাগরিক সেবা</h1>
            <p>হোল্ডিং ট্যাক্স রসিদ</p>
        </div>
        
        <div class="invoice-details">
            <div class="detail-row">
                <div class="detail-label">রসিদ নম্বর:</div>
                <div class="detail-value">{{ $taxPayment->id }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">তারিখ:</div>
                <div class="detail-value">{{ $taxPayment->created_at->format('d/m/Y') }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">হোল্ডিং নম্বর:</div>
                <div class="detail-value">{{ $taxPayment->holding_number }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">পরিশোধকারীর নাম:</div>
                <div class="detail-value">{{ auth()->user()->name }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">মোবাইল নম্বর:</div>
                <div class="detail-value">{{ auth()->user()->phone }}</div>
            </div>
        </div>
        
        <div class="amount-section">
            <div class="amount-row">
                <div>মূল কর:</div>
                <div>{{ number_format($taxPayment->tax_amount) }} টাকা</div>
            </div>
            
            <div class="amount-row">
                <div>জরিমানা:</div>
                <div>0 টাকা</div>
            </div>
            
            <div class="amount-row">
                <div>মোট পরিশোধিত:</div>
                <div class="total-amount">{{ number_format($taxPayment->tax_amount) }} টাকা</div>
            </div>
        </div>
        
        <div class="print-btn">
            <button class="btn btn-success btn-lg" onclick="window.print()">
                <i class="bi bi-printer me-2"></i>প্রিন্ট করুন / ডাউনলোড করুন
            </button>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>