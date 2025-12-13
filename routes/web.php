<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Middleware\CheckSeller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\ProductCategoryController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\TransactionController;
use App\Http\Controllers\CartController;

// Homepage
Route::get('/', [CustomerHomeController::class, 'index'])->name('customer.home');
Route::get('/search', [CustomerHomeController::class, 'search'])->name('customer.search');

// Dashboard & Profile
Route::get('/dashboard', function () {
    return redirect()->route('customer.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', CheckSeller::class])
    ->prefix('seller/dashboard')
    ->name('seller.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('categories', ProductCategoryController::class);
        Route::resource('products', ProductController::class);

        Route::controller(StoreController::class)->group(function () {
            Route::get('/register', 'create')->name('store.register');
            Route::post('/register', 'store')->name('store.store');
            Route::get('/manage', 'manage')->name('store.manage');
            Route::put('/manage', 'update')->name('store.update');
            Route::delete('/manage', 'destroy')->name('store.destroy');
        });

        // Placeholder Routes for Sidebar
        Route::get('/orders', function () { return "Pesanan Page"; })->name('orders.index');
        Route::get('/balance', function () { return "Saldo Toko Page"; })->name('balance.index');
        Route::get('/withdraw', function () { return "Penarikan Dana Page"; })->name('withdraw.index');
    });

// Customer Product & Transaction Routes
Route::get('/products/{id}', [CustomerHomeController::class, 'show'])->name('customer.product.show');

// Consolidating Transaction Routes
// Using the 'transaction.show' name for proper linking
Route::middleware('auth')->group(function () {
    // Checkout/Transaction Process
    Route::get('/checkout/{product}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/checkout', [TransactionController::class, 'process'])->name('transaction.process');
    
    // Transaction History & Details
    Route::get('/transactions', [TransactionController::class, 'history'])->name('transaction.history');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'detail'])->name('transaction.detail');
    Route::post('/transaction/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('transaction.confirm');
    
    // Cart
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
});

require __DIR__ . '/auth.php';
