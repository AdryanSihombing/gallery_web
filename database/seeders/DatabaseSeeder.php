<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'adrianadmin',
            'username' => 'adrianadmin',
            'email' => 'adrianadmin@gmail.com',
            'password' => bcrypt('adrianadmin'), // Ganti dengan password yang diinginkan
            'address' => 'Admin Address',
            'profile_pic' => null, // atau path ke gambar jika ada
            'role' => 'admin',
        ]);

        // Anda bisa menambahkan data user lainnya jika diperlukan
    }
}