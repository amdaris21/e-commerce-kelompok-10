<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ProductCategoryController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Customer\CustomerHomeController;


Route::get('/', [CustomerHomeController::class, 'index'])->name('customer.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('seller/dashboard')->name('seller.')->group(function () {
    Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/search', [CustomerHomeController::class, 'search'])->name('customer.search');

Route::get('/products/{id}', [CustomerHomeController::class, 'show'])->name('customer.product.show');


Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/checkout/{id}', [App\Http\Controllers\Customer\TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/checkout', [App\Http\Controllers\Customer\TransactionController::class, 'process'])->name('transaction.process');
});

require __DIR__ . '/auth.php';
