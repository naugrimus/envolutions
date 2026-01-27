<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends seeder
{
    public function run(): void {
        Role::create(['name' => Roles::AGENT->value]);
        Role::create(['name' => Roles::USER->value]);
    }
}
