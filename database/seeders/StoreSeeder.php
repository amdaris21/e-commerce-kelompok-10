<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua data lama dulu (opsional)
        DB::table('stores')->delete();

        $user = DB::table('users')->first();
        $userId = $user ? $user->id : 1;

        // Insert satu data store
        $user = DB::table('users')->first();
        $userId = $user ? $user->id : 1;

        DB::table('stores')->insert([
            'user_id'     => $userId,
            'name'        => 'wayToCake',
            'logo'        => 'images/wtc-logo.png',
            'about'       => 'Toko khusus aksesori Y2K',
            'phone'       => '08987654321',
            'address_id'  => 2221,
            'city'        => 'Malang',
            'address'     => 'Jl. Siragu-ragu No. 22',
            'postal_code' => '65100',
            'is_verified' => 0,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
