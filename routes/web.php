<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\User\UserDashboard;

// ====================
// Public User Routes
// ====================

// Home & Pages
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

// Authentication: Registration
Route::get('/registration', [FrontController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [FrontController::class, 'registration_submit'])->name('registration_submit');

// Email Verification
Route::get('/registration-verify-email/{email}/{token}', [FrontController::class, 'registration_verify_email'])->name('registration_verify_email');

// Authentication: Login & Logout
Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::post('/login', [FrontController::class, 'userlogin'])->name('login_submit');
Route::get('/logout', [FrontController::class, 'logout'])->name('logout');

// Password Reset (User)
Route::get('/forget/password', [FrontController::class, 'forget_password'])->name('userforget_password');
Route::post('/forget_password', [FrontController::class, 'forget_password_submits'])->name('forget_password_submits');
Route::get('/reset-password/{token}/{email}', [FrontController::class, 'reset_passwords'])->name('reset_passwords');
Route::post('/reset-password/{token}/{email}', [FrontController::class, 'reset_password_submits'])->name('reset_password_submits');


// ====================
// Admin Routes
// ====================

Route::prefix('admin')->group(function () {

    // Authentication: Login & Logout
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');

    // Password Reset
    Route::get('/forget_password', [AdminAuthController::class, 'forget_password'])->name('forget_password');
    Route::post('/forget_password', [AdminAuthController::class, 'forget_password_submit'])->name('forget_password_submit');
    Route::get('/reset-password{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('reset_password_submit');
});


// ====================
// Admin Protected Routes (Requires Middleware)
// ====================

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('profile');
    Route::post('/profile/change', [AdminDashboardController::class, 'profilechange'])->name('admin_profile_submit');
});




 // User
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/userdashboard',[UserDashboard::class,'dashboard'])->name('user_dashboard');
});