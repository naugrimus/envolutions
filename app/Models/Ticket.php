<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\DetectUserScope;

class Ticket extends Model
{

    protected static function booted(): void
    {
        static::addGlobalScope(new DetectUserScope());
    }
    protected $table = 'ticket';
    protected $fillable = [
        'user_id',
        'status',
        'title',
        'description',
        'priority',
    ];
}
