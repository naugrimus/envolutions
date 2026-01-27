<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Agent User',
            'email' => 'agent@test.nl',
            'password' => Hash::make('test123'),

        ])->assignRole('agent');


        User::create([
            'name' => 'normal User',
            'email' => 'user1@test.nl',
            'password' => Hash::make('test123'),

        ])->assignRole('user');

        User::create([
            'name' => 'normal User',
            'email' => 'user2@test.nl',
            'password' => Hash::make('test123'),

        ])->assignRole('user');


    }
}
