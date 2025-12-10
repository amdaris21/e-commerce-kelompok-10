<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Middleware\CheckSeller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\ProductCategoryController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\StoreController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
            Route::get('/manage', 'edit')->name('store.manage');
            Route::put('/manage', 'update')->name('store.update');
            Route::delete('/manage', 'destroy')->name('store.destroy');
        });

        // Placeholder Routes for Sidebar
        Route::get('/orders', function () { return "Pesanan Page"; })->name('orders.index');
        Route::get('/balance', function () { return "Saldo Toko Page"; })->name('balance.index');
        Route::get('/withdraw', function () { return "Penarikan Dana Page"; })->name('withdraw.index');
    });

require __DIR__ . '/auth.php';
