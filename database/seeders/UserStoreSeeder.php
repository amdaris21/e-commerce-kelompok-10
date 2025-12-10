<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserStoreSeeder extends Seeder
{
    public function run(): void
    {
        $seller = User::factory()->create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
            'email_verified_at' => now(),
        ]);

        Store::create([
            'user_id' => $seller->id,
            'name' => 'Toko Seller',
            'about' => 'Ini adalah toko contoh untuk user seller.',
            'phone' => '08123456789',
            'address' => 'Jl. Contoh No.123',
            'city' => 'Kota Mayong',
            'postal_code' => '12345',
            'is_verified' => true,
            'logo' => 'default',
            'address_id' => 0,
        ]);
    }
}
