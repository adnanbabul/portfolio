<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Adnan',
                'user_name' => 'Adnan',
                'email' => 'admin@gmail.com',
                'image' => 'https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin123'),
                'remember_token' => Str::random(10),
            ]);
            User::create([
                'name' => 'Saiful Islam',
                'user_name' => 'Saiful',
                'email' => 'saiful@gmail.com',
                'image' => 'https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin123'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
