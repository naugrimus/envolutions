<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends seeder
{
    public function run(): void {
        Role::create(['name' => 'agent']);
        Role::create(['name' => 'user']);
    }
}
