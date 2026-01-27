<?php

namespace App\Models\Scopes;

use App\Enums\Roles;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class DetectUserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void {

        $user = auth()->user();
        if(!$user->hasRole([Roles::AGENT->value])) {
            $builder->where(
                $model->getTable() . '.user_id',
                $user->id
            );
        }
    }

}
