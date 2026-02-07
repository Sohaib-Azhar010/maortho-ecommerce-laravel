<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\EnsureUserIsAdmin;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/store', [HomeController::class, 'store'])->name('store');
Route::get('/products/{product}', [HomeController::class, 'product'])->name('products.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout & PayFast payment
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout/payfast', [CheckoutController::class, 'startPayFast'])->name('checkout.payfast');
Route::get('/checkout/otp/{order}', [CheckoutController::class, 'showOtpForm'])->name('checkout.otp');
Route::post('/checkout/otp/{order}', [CheckoutController::class, 'confirmPayFast'])->name('checkout.otp.confirm');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');

    Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        
        // Categories
        Route::resource('categories', CategoryController::class)->names('admin.categories');

        // Products
        Route::resource('products', ProductController::class)->names('admin.products');

        // Feedback moderation
        Route::resource('feedback', \App\Http\Controllers\Admin\FeedbackController::class)
            ->only(['index', 'update'])
            ->names('admin.feedback');

        // Messages
        Route::get('messages/{message}/read', [\App\Http\Controllers\Admin\MessageController::class, 'markAsRead'])->name('admin.messages.read');
        Route::get('messages/{message}/unread', [\App\Http\Controllers\Admin\MessageController::class, 'markAsUnread'])->name('admin.messages.unread');
        Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class)->names('admin.messages');
    });
});
