<?php

namespace App\Models;

use App\Enums\Priorities;
use Carbon\Carbon;
use Exception;
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
        'sla'
    ];

    public function replies(): HasMany {
        return $this->hasMany(Reply::class);
    }

    public function detectSLA(string $priority): Carbon {

        $priorities =  Priorities::values();
        if(in_array($priority, $priorities) === false) {
            throw new Exception(sprintf('Priority %s not defined', $priority));
        }
        $now = Carbon::now();
        match($priority) {
            'LOW' => $now->add('12H'),
            'HIGH' => $now->add('4H'),
            'MEDIUM' => $now->add('8H'),
        };

        return $now;
    }
}
