<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalsController;


Route::get('/loginform', [AuthController::class, 'showLoginForm'])->name('showlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registerform', [AuthController::class, 'showRegisterForm'])->name('showregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/', [HomeController::class, 'index']);
Route::resource('customers', CustomerController::class);
Route::resource('rentals', RentalsController::class);


Route::get('/admindashboard', function () {
    return view('dashboard.admin');
})->name('admin_dashboard');

Route::get('/customerdashboard', function () {
    return view('dashboard.customer');
})->name('customer_dashboard');
