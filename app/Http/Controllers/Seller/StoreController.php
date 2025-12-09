<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function create()
    {
        if (Auth::user()->store) {
            return redirect()->route('seller.store.manage');
        }

        return view('seller.store.register');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->store) {
            return redirect()->route('seller.store.manage')->with('error', 'Anda sudah memiliki toko.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:stores,name',
            'about' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'logo' => 'nullable|image|max:2048',
        ]);

        $validated['user_id'] = $user->id;
        $validated['is_verified'] = false;

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('store_logos', 'public');
            $validated['logo'] = 'storage/' . $path;
        }

        Store::create($validated);

        return redirect()->route('seller.store.manage')->with('success', 'Pendaftaran toko berhasil! Status: Menunggu verifikasi Admin.');
    }

    public function edit(string $id)
    {
        $store = Auth::user()->store;

        if (!$store) {
            return redirect()->route('seller.store.register');
        }

        return view('seller.store.manage', compact('store'));
    }

    public function update(Request $request, string $id)
    {
        $store = Auth::user()->store;

        if (!$store) {
            return redirect()->route('seller.store.register')->with('error', 'Toko tidak ditemukan.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:stores,name,' . $store->id,
            'about' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($store->logo) {
                $oldPath = str_replace('storage/', '', $store->logo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('logo')->store('store_logos', 'public');
            $validated['logo'] = 'storage/' . $path;
        }

        $store->update($validated);

        return redirect()->route('seller.store.manage')->with('success', 'Profil toko berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $store = Auth::user()->store;

        if ($store) {
            if ($store->logo) {
                $path = str_replace('storage/', '', $store->logo);
                Storage::disk('public')->delete($path);
            }

            $store->delete();
        }

        return redirect()->route('seller.store.register')->with('success', 'Toko Anda berhasil dihapus.');
    }
}
