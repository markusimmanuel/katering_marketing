<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

// Route Home
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')

// Tambahkan autentikasi
require __DIR__.'/auth.php';

// Rute untuk Merchant
Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::get('/merchant/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');

    // Pengelolaan Profil Merchant
    Route::get('/merchant/profile', [MerchantController::class, 'editProfile'])->name('merchant.profile.edit');
    Route::put('/merchant/profile', [MerchantController::class, 'updateProfile'])->name('merchant.profile.update');

    // Pengelolaan Menu
    Route::resource('/merchant/menu', MenuController::class);

    // Daftar Order untuk Merchant
    Route::get('/merchant/orders', [OrderController::class, 'merchantOrders'])->name('merchant.orders');
    Route::get('/merchant/orders/{order}', [OrderController::class, 'show'])->name('merchant.orders.show');
});

// Rute untuk Customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');

    // Pencarian Katering
    Route::get('/search', [CustomerController::class, 'search'])->name('customer.search');

    // Pembelian dan Order Menu
    Route::post('/customer/order', [OrderController::class, 'store'])->name('customer.order.store');
    Route::get('/customer/orders', [OrderController::class, 'customerOrders'])->name('customer.orders');
    Route::get('/customer/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');

    // Invoice
    // Route::get('/customer/invoices/{order}', [InvoiceController::class, 'show'])->name('customer.invoice.show');
});
