<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory {
    public function definition() {
        return [
            'title' => 'test title',
            'description' => 'test description',
        ];
    }
}

