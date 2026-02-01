<?php

namespace App\Http\Controllers;

use App\DTO\ReplyDTO;
use App\Http\Requests\ReplyRequest;
use App\Models\Ticket;
use App\Repositories\ReplyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReplyController
{
    public function __construct(protected readonly ReplyRepository $replyRepository){}

    public function store(ReplyRequest $request, Ticket $ticket): RedirectResponse {
        $dto = ReplyDTO::create($request, $ticket);
        $this->replyRepository->create($dto);
        session()->flash('success', 'Reply created');
        return redirect()->route('ticket.index');

    }
}
