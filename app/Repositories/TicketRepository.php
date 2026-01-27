<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Ticket;
use Illuminate\Support\Collection;
class TicketRepository implements RepositoryInterface
{

    public function all() : Collection {
        return Ticket::all();
    }
}
