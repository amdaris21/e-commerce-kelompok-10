<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index()
    {
        // 1. Total Users
        $totalUsers = User::count();

        // 2. Total Sellers (Users with a Store)
        $totalSellers = Store::count();

        // 3. Total Stores (Same as above, but keeping separation for logic if needed)
        $totalStores = Store::count();

        // 4. Pending Verifications
        $pendingStores = Store::where('is_verified', false)->count();

        // 5. Recent Activity
        $latestUsers = User::latest()->take(5)->get();
        $latestStores = Store::latest()->take(5)->get();

        // 6. Chart Data (Simulation for Visuals)
        // In real app, we would group by created_at.
        $monthlyStats = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'data' => [12, 19, 3, 5, 2, 10], // Dummy data for "rame" UI
        ];

        return view('admin.dashboard', compact(
            'totalUsers', 'totalSellers', 'totalStores', 'pendingStores',
            'latestUsers', 'latestStores', 'monthlyStats'
        ));
    }

    /**
     * Display the System Management Page.
     */
    /**
     * Display the Store Verification Page.
     */
    public function verification()
    {
        $pendingStoresList = Store::with('user')->where('is_verified', false)->get();
        return view('admin.verification', compact('pendingStoresList'));
    }

    /**
     * Display the System Management Page (Users & Stores).
     */
    public function management()
    {
        // All Users
        $users = User::all();

        // All Stores
        $stores = Store::with('user')->get();

        return view('admin.management', compact('users', 'stores'));
    }

    /**
     * Verify (Approve) a Store.
     */
    public function verifyStore(Request $request, $id)
    {
        $store = Store::findOrFail($id);
        
        $action = $request->input('action'); // 'approve' or 'reject'

        if ($action === 'approve') {
            $store->update(['is_verified' => true]);
            // Ensure User role is updated if needed (though logic usually relies on store existence)
             return redirect()->back()->with('success', 'Toko berhasil diverifikasi.');
        } elseif ($action === 'reject') {
            // Delete the store or mark as rejected
            $store->delete(); // Simple rejection for now
            return redirect()->back()->with('success', 'Pengajuan toko ditolak.');
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }
}
