<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;

  Route::get('/', [FrontController::class, 'home'])->name('home');



// Public admin routes (no middleware)
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
    Route::get('forget_password', [AdminAuthController::class, 'forget_password'])->name('forget_password');
    Route::post('/forget_password',[AdminAuthController::class,'forget_password_submit'])->name('forget_password_submit');
    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password_submit'])->name('reset_password_submit');

});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminDashboardController::class,'profile'])->name('profile');
    Route::post('/profile/change',[AdminDashboardController::class,'profilechange'])->name('admin_profile_submit');
});

 Route::get('about', [FrontController::class, 'about'])->name('about');