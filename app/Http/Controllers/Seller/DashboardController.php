<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $store = Auth::user()->store;
        if (!$store) {
            return redirect()->route('seller.store.register')
                ->with('info', 'Silakan daftar toko terlebih dahulu ya..');
        }
        $totalProducts = $store->products()->count();
        $totalOrders = $store->transactions()->count();
        $totalSales = $store->transactions()
            ->where('payment_status', 'paid')
            ->sum('grand_total');
        $isVerified = $store->is_verified;

        return view('seller.dashboard', compact('store', 'totalProducts', 'totalOrders', 'totalSales', 'isVerified'));
    }
}
