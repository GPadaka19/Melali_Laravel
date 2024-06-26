<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookingController;
use App\Models\Destination;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Middleware
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Destination
Route::get('/booking/{destination}', function ($destination) {
    $judulForm = "Form Pemesanan Tiket $destination";

    return view('booking.booking', compact('judulForm'));
})->name('booking');

// Destination and Booking
Route::get('/booking/{destination}', [BookingController::class, 'booking'])->name('booking');
Route::post('/booking', [BookingController::class, 'actionbooking'])->name('actionbooking');
Route::get('/home', [HomeController::class, 'index'])->name('home');

