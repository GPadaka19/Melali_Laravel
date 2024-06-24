<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



Route::get('/', [LandingController::class, 'index'])->name('landing');


//register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');


//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

//middleware
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//destination
Route::get('/booking/{destination}', function ($destination) {
    $judulForm = "Form Pemesanan Tiket $destination";

    return view('booking.booking', compact('judulForm'));
})->name('booking');
