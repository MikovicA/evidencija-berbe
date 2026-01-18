<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Gazda',
            'email' => 'gazda@test.com',
            'password' => Hash::make('password'),
            'role' => 'gazda',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Radnik',
            'email' => 'radnik@test.com',
            'password' => Hash::make('password'),
            'role' => 'radnik',
            'email_verified_at' => now(),
        ]);
    }
}
