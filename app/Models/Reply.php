<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    protected $fillable = [
        'user_id',
        'reply',
        'ticket_id',
        'internal',
        'reply_date'
    ];
}
