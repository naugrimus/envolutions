<?php

namespace App\View\Components\Ticket;

use App\Models\Ticket;
use App\Repositories\UserRepository;
use Illuminate\View\Component;

class User extends Component
{

    public function __construct(protected readonly UserRepository $userRepository){}
    public function render() {
        $users = $this->userRepository->allAgents();
        return view('components.ticket.user', [
            'users' => $users
        ]);
    }
}
