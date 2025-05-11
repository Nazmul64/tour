<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Public admin routes (no middleware)
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('admin_login');

    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
    Route::get('forgotpassword', [AdminAuthController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('/forget_password_submit',[AdminAuthController::class,'forget_password_submit'])->name('forget_password_submit');
});

Route::middleware('admin')->prefix('admin')->group(function () {    
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminDashboardController::class,'profile'])->name('profile');
});

