<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileFormController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cirtificates', function () {
    return view('certificateList');
})->name('cirtificates');

Route::get('/birthcertificate', function () {
    return view('certificateForm.birthcertificate');
})->name('birthcertificate');

Route::get('/deathcertificate', function () {
    return view('certificateForm.deathcertificate');
})->name('deathcertificate');
Route::get('/developmentConplaint', function () {
    return view('development_complaint');
})->name('developmentComplaint');
Route::get('/socialAllowance', function () {
    return view('social_allowance');
})->name('social.allowance');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard'); // [UserDashboardController::class,'index'] )
    Route::get('/user/profile', [ProfileFormController::class, 'create'])->name('user.profile');
    Route::post('/user/store', [ProfileFormController::class, 'store'])->name('store');
    Route::post('/birthcertificate/store', [App\Http\Controllers\BirthCertificateController::class, 'store'])->name('birthcertificate.store');
    Route::get('/birthcertificate/payment/{application_id}', [App\Http\Controllers\BirthCertificateController::class, 'paymentForm'])->name('payment.form');
    Route::post('/birthcertificate/process-payment', [App\Http\Controllers\BirthCertificateController::class, 'processPayment'])->name('birthcertificate.process.payment');
    Route::get('/user/certificatesService',function (){return view('user.certificatesService');})->name('user.certificatesService');
    //user management route
    Route::get('/user/usermangment', [App\Http\Controllers\UserDashboardController::class, 'userMangment'])->name('user.usermangment');

    // Tax payment routes
    Route::get('/user/tax', [App\Http\Controllers\TaxController::class, 'dashboard'])->name('tax.dashboard');
    Route::get('/user/tax/holding-number', [App\Http\Controllers\TaxController::class, 'showHoldingNumberForm'])->name('tax.holding.number.form');
    Route::post('/user/tax/holding-number', [App\Http\Controllers\TaxController::class, 'storeHoldingNumber'])->name('tax.holding.number.store');
    Route::get('/user/tax/payment', [App\Http\Controllers\TaxController::class, 'showPaymentForm'])->name('tax.payment.form');
    Route::post('/user/tax/payment', [App\Http\Controllers\TaxController::class, 'processPayment'])->name('tax.payment.process');
    Route::get('/user/tax/invoice/{id}', [App\Http\Controllers\TaxController::class, 'downloadInvoice'])->name('tax.invoice.download');
});

// Admin panel route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('verify-otp', [RegisteredUserController::class, 'showOtpForm'])->name('verify.otp.form');
Route::post('verify-otp', [RegisteredUserController::class, 'verifyOtp'])->name('verify.otp');
require __DIR__ . '/auth.php';
