<?php

namespace App\View\Components\Ticket;

use App\Enums\Priorities;
use App\Models\Ticket;
use Illuminate\View\Component;

class Priority extends Component
{

    public function __construct(protected readonly Ticket $ticket, protected readonly bool $readonly){}
    public function render()
    {
        $priorities = Priorities::values();
        return view('components.ticket.priority',
            [
                'ticket' => $this->ticket,
                'readonly' => $this->readonly,
                'priorities' => $priorities,
            ]
        );
    }
}
