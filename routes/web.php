<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

// Route Home
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Tambahkan autentikasi
require __DIR__.'/auth.php';

// Routes untuk Merchant
Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::get('/merchant/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');
    Route::resource('/merchant/menu', MenuController::class);
});

// Routes untuk Customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::post('/customer/order', [OrderController::class, 'store'])->name('customer.order.store');
});
