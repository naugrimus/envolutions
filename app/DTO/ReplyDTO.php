<?php

namespace App\DTO;

use App\Models\Reply;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ReplyDTO extends AbstractDTO
{


    public function __construct(protected readonly User $user, protected readonly Reply $reply,
                                protected readonly Ticket $ticket) {

    }
    public static function create(FormRequest $request, Ticket $ticket): self {
        $user = auth()->user();
        $reply = self::fromRequest($request);
        $reply->ticket = $ticket;
        $reply->description = $request->get("reply");
        return new self($user, $reply, $ticket);
    }

    public function getReply(): ?Reply {
        return $this->reply;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getTicket(): Ticket {
        return $this->ticket;
    }

    protected static function fromRequest(FormRequest $request): Model
    {
        $reply = new Reply();
        $reply->reply = $request->get("reply");
        $reply->internal = $request->get("internal")??false;
        return $reply;
    }
}
