<?php

namespace App\Http\Controllers;

use App\DTO\ReplyDTO;
use App\Http\Requests\ReplyRequest;
use App\Models\Ticket;
use App\Repositories\ReplyRepository;
use Illuminate\Http\Request;

class ReplyController
{
    public function __construct(protected readonly ReplyRepository $replyRepository){}

    public function store(ReplyRequest $request, Ticket $ticket) {
        $dto = ReplyDTO::create($request, $ticket);
        $this->replyRepository->create($dto);
    }
}
