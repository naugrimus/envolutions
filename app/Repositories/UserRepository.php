<?php

namespace App\Repositories;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{

    public function allAgents() : Collection {
        return User::Role(Roles::AGENT)->get();
    }
}
