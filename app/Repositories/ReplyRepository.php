<?php

namespace App\Repositories;

use App\DTO\ReplyDTO;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;

class ReplyRepository
{

    public function create(ReplyDTO $dto): void {

        $reply = $dto->getReply();
        $reply->user = $dto->getUser();


        Reply::create([
            'reply' => $reply->description,
            'internal' => $dto->getReply()->internal,
            'user_id' => $dto->getUser()->id,
            'ticket_id' => $dto->getTicket()->id,
        ]);
    }
}
