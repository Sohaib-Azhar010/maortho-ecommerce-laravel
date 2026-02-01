<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\EnsureUserIsAdmin;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');

    Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        
        // Categories
        Route::resource('categories', CategoryController::class)->names('admin.categories');
    });
});
