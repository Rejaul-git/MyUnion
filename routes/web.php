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
// taxFrom
Route::get('/taxes', function () {
    return view('tax.taxsSubmitForm');
})->name('taxes');


Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard'); // [UserDashboardController::class,'index'] )
    Route::get('/user/profile', function () {
        return view('user.profileform');
    })->name('user.profile');
    Route::post('/user/store', [ProfileFormController::class, 'store'])->name('store');
    Route::post('/birthcertificate/store', [App\Http\Controllers\BirthCertificateController::class, 'store'])->name('birthcertificate.store');
    Route::get('/birthcertificate/payment/{application_id}', [App\Http\Controllers\BirthCertificateController::class, 'paymentForm'])->name('payment.form');
    Route::post('/birthcertificate/process-payment', [App\Http\Controllers\BirthCertificateController::class, 'processPayment'])->name('birthcertificate.process.payment');
    // tax-dashboard
    Route::get('/user/tax', function () {
        return view('user.taxPaymentDashboard');
    })->name('tax.dashboard');
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
