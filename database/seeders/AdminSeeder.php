<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // ✅ সঠিক Admin মডেল path

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'photo' => 'admin.jpg',
            'password' => Hash::make('admin@gmail.com'), // Hash করা পাসওয়ার্ড
        ]);
    }
}
