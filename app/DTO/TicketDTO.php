<?php

namespace App\DTO;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class TicketDTO extends AbstractDTO
{


    public function __construct (protected Ticket $ticket, protected readonly User $user){}

    public static function create(FormRequest $request): self {
        $user = auth()->user();
        $ticket = self::fromRequest($request);
        $ticket->user = $user;
        $ticket->sla = $ticket->detectSLA('LOW');
        return new self($ticket, $user);
    }
    protected static function fromRequest(FormRequest $request): Model
    {
        $ticket = new Ticket();
        $ticket->fill($request->validated());

        return $ticket;
    }

    public function getTicket(): Ticket {
        return $this->ticket;
    }

    public function getUser(): User {
        return $this->user;
    }







}
