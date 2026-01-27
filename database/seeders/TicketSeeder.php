<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{

    public function run(): void {

        Ticket::create(['user_id' => 1,'title' => 'test agent ticket',
            'description' => 'test agent ticket',]);

        Ticket::create(['user_id' => 2,'title' => 'test user 1 ticket',
            'description' => 'test user 1 ticket',]);
        Ticket::create(['user_id' => 3,'title' => 'test user 2 ticket',
            'description' => 'test user 2 ticket',]);

    }
}
