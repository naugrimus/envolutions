<?php

namespace App\View\Components\Ticket;

use Illuminate\View\Component;
use App\Models\Ticket;
use App\Enums\Status as StatusEnum;

class Status extends Component
{

    public function __construct(protected readonly Ticket $ticket, protected readonly bool $readonly){}

    public function render()
    {
        $statusses = StatusEnum::values();
        return view('components.ticket.status',
            [
                'ticket' => $this->ticket,
                'readonly' => $this->readonly,
                'statusses' => $statusses
            ]
        );
    }
}
