<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Desa Pabuaran',
            'email' => 'pemdespabuaran001@gmail.com',
            'password' => Hash::make('AdminPabuar@n001'),
        ]);
    }
}
