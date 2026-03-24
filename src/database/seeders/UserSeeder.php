<?php

namespace Database\Seeders;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
        public function run(): void
    {
        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password123'),
            'role' => 'organizer',
        ]);

        User::create([
        'name' => 'ilyass Player',
        'email' => 'ilyass@tournoi.com',
        'password' => bcrypt('password123'),
        'role' => 'player',
    ]);
    }
}
