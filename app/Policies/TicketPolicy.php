<?php

namespace App\Policies;

use App\Enums\Roles;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{

    use HandlesAuthorization;

    public function Update(User $user, Ticket $ticket): bool {

        if($user->can('update ticket', $ticket)) {
            return true;
        }
        return false;
    }


}
