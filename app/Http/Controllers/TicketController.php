<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Repositories\TicketRepository;

class TicketController
{

    public function __construct(protected readonly TicketRepository $ticketRepository) {}


    public function index() {

        $tickets = $this->ticketRepository->all();
        return view('ticket.index',
        [
            'tickets' => $tickets
        ]);
    }

    public function show(Ticket $ticket) {
        return view('ticket.details',
        [
            'ticket' => $ticket,
            'replies' => $ticket->replies()
        ]);
    }

    public function edit(Ticket $ticket) {
        return view('ticket.details',
            [
                'ticket' => $ticket,
                'replies' => $ticket->replies()->get()
            ]);
    }
}
