<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'rejaulk431@gmail.com'],
            [
                'name' => 'Admin',
                'phone' => '01783822929',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_verified' => true,
            ]
        );
        User::updateOrCreate(
            ['email' => 'rejaulk@gmail.com'],
            [
                'name' => 'User',
                'phone' => '01783822930',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'is_verified' => true,
            ]
        );
    }
}
