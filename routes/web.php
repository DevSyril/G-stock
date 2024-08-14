<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware('auth')->group( function () {

    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

});


Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');

Route::get('/', [ViewController::class, 'login'])->name('login');
Route::get('/login', [ViewController::class, 'login'])->name('login');
Route::get('/registration', [ViewController::class, 'register'])->name('registration');
Route::get('/logout', [ViewController::class, 'logout'])->name('logout');

Route::get('/forgotten-password', [ViewController::class, 'forgottenPassword'])->name('forgottenPassword');
Route::get('/otp-code', [ViewController::class, 'otpCode'])->name('otpCode');
Route::get('/new-password', [ViewController::class, 'newPassword'])->name('newPassword');


Route::post('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otp-code', [AuthController::class, 'checkOtpCode'])->name('otpCode.process');
Route::post('/new-password', [AuthController::class, 'newPassword'])->name('newPassword.process');
