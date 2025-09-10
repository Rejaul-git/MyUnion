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
                'phone' => '01700000000',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_verified' => true,
            ]
        );
    }
}
