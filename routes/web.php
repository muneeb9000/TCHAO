<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalsController;



// Authentication Routes
Route::get('/loginform', [AuthController::class, 'showLoginForm'])->name('showlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/adminform', [AuthController::class, 'showadminForm'])->name('showadminForm');
Route::post('/adminlogin', [AuthController::class, 'adminlogin'])->name('adminlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registerform', [AuthController::class, 'showRegisterForm'])->name('showregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Public Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('cityrentals', [HomeController::class, 'cityrentals'])->name('cityrentals');



// Routes that require authentication
Route::middleware('CustomAuth')->group(function () {
    Route::resource('customers', CustomerController::class);
  
    Route::resource('rentals', RentalsController::class);
    Route::resource('bookings', BookingController::class);

    Route::get('/admindashboard', function () {
        return view('dashboard.admin');
    })->name('admin_dashboard');

    Route::get('/customerdashboard', function () {
        return view('dashboard.customer');
    })->name('customer_dashboard');
});
