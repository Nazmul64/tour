<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ✅ Public route: should be OUTSIDE middleware


// ✅ Protected admin routes
Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin_login');
Route::get('forgotpassword', [AdminAuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
Route::get('profile', [AdminAuthController::class, 'profile'])->name('profile');


