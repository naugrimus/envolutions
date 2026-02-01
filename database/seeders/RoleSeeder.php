<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends seeder
{
    public function run(): void {
        Role::create(['name' => Roles::AGENT->value]);
        Role::create(['name' => Roles::USER->value]);

        Permission::firstOrCreate(['name' => 'update ticket']);
        Permission::firstOrCreate(['name' => 'assign user']);

    }
}
