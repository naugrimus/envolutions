<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\DetectUserScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ticket extends Model
{
    use HasFactory;

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

    public function replies(): HasMany {
        return $this->hasMany(Reply::class);
    }
}
