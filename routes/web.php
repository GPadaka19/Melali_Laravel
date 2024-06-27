<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookingController;


Route::get('/', [LandingController::class, 'index'])->name('landing');

// Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Reset
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Forget
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Middleware
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Destination and Booking
Route::get('/booking/{destination}', [BookingController::class, 'booking'])->name('booking');
Route::post('/booking', [BookingController::class, 'actionbooking'])->name('actionbooking');

// Payment
Route::get('/payment', [BookingController::class, 'payment'])->name('payment');
Route::post('/payment/action', [BookingController::class, 'actionPayment'])->name('payment.action');