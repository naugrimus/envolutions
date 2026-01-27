<?php

namespace Database\Seeders;

use App\Models\Organisation;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    public function run(): void {
        Organisation::create(['name' => 'admin organisation']);
        Organisation::create(['name' => 'user organisation']);

    }
}
