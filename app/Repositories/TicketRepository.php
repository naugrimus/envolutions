<?php

namespace App\Repositories;

use App\DTO\TicketDTO;
use App\Http\Requests\UpdateTicketRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Ticket;
use Illuminate\Support\Collection;
class TicketRepository implements RepositoryInterface
{

    public function create(TicketDto $ticketDto): void {

        $ticket = $ticketDto->getTicket();

        Ticket::create([
            'description' => $ticket->description,
            'title' => $ticket->title,
            'user_id' => $ticketDto->getUser()->id,
            'sla' => $ticket->sla,

        ]);
    }


    public function update(array $data, Ticket $ticket): void {

        $ticket->update($data);
    }
    public function all() : Collection {
        return Ticket::all();
    }
}
