<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ✅ Public route: should be OUTSIDE middleware


// ✅ Protected admin routes
Route::get('login', [AdminAuthController::class, 'login'])->name('admin_login');
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});

