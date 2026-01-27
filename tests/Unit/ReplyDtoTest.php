<?php

namespace Tests\Unit;

use App\DTO\ReplyDTO;
use App\Enums\Roles;
use App\Models\Reply;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Tests\TestCase;

class ReplyDtoTest extends TestCase
{

    public function test_can_use_reply_dto() {
        $user = User::factory()->make();
        $this->be($user); // sets auth()->user() to $user

        $ticket = Ticket::factory()->make();


        $request = new class extends FormRequest {
            public function post($key = null, $default = null)
            {
                $data = [
                    'reply' => 'This is a test reply',
                    'internal' => true,
                ];
                return $data[$key] ?? $default;
            }
        };
        // 4️⃣ Call the DTO factory
        $dto = ReplyDTO::create($request, $ticket);
        $this->assertInstanceOf(Reply::class, $dto->getReply());
        $this->assertInstanceOf(Ticket::class, $dto->getTicket());

    }
}
