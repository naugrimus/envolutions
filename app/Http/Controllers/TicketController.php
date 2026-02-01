<?php

namespace App\Http\Controllers;

use App\DTO\TicketDTO;
use App\Enums\Status;
use App\Http\Requests\CreateTicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TicketController
{

    public function __construct(protected readonly TicketRepository $ticketRepository) {}

    public function store(CreateTicketRequest $request): RedirectResponse {
        $dto = TicketDTO::create($request);
        $this->ticketRepository->create($dto);
        return redirect()->route('ticket.index');

    }

    public function create(): View {
        return view('ticket.create');
    }

    public function index(): View {

        $tickets = $this->ticketRepository->all();
        return view('ticket.index',
        [
            'tickets' => $tickets
        ]);
    }



    public function show(Ticket $ticket): View {
        return view('ticket.details',
        [
            'ticket' => $ticket,
            'replies' => $ticket->replies(),
            'statusses' => Status::values(),
            'readonly' => true,
        ]);
    }

    public function edit(Ticket $ticket): view {
        return view('ticket.details',
            [
                'ticket' => $ticket,
                'replies' => $ticket->replies()->get(),
                'statusses' => Status::values(),
                'readonly' => false,
            ]);
    }
}
