<?php

namespace Database\Seeders;

use App\Enums\Roles;
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
            'organisation_id' => 1,
            'email' => 'agent@test.nl',
            'password' => Hash::make('test123'),

        ])->assignRole(Roles::AGENT->value);


        User::create([
            'name' => 'normal User',
            'organisation_id' => 2,
            'email' => 'user1@test.nl',
            'password' => Hash::make('test123'),

        ])->assignRole(Roles::USER->value);

        User::create([
            'name' => 'normal User',
            'email' => 'user2@test.nl',
            'organisation_id' => 2,
            'password' => Hash::make('test123'),

        ])->assignRole(Roles::USER->value);


    }
}
