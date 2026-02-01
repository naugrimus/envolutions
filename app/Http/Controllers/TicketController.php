<?php

namespace App\Http\Controllers;

use App\DTO\TicketDTO;
use App\Enums\Status;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TicketController extends Controller
{

    use AuthorizesRequests;

    public function __construct(protected readonly TicketRepository $ticketRepository) {}

    public function store(CreateTicketRequest $request): RedirectResponse {
        $dto = TicketDTO::create($request);
        $this->ticketRepository->create($dto);
        return redirect()->route('ticket.index');

    }

    public function update(UpdateTicketRequest $request, Ticket $ticket): RedirectResponse {
        $this->authorize('update ticket', $ticket);
        $all=$request->validated();
        if($all['user']) {
            $all['assigned_user_id'] = $all['user'];
        }
        unset($all['user']);

        $this->ticketRepository->update($all, $ticket);
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
