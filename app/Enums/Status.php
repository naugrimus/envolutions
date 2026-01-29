<?php

namespace App\Enums;

use function PHPSTORM_META\map;

enum Status: string
{
    case OPEN = 'OPEN';

    case CLOSED = 'CLOSED';

    case IN_PROGRESS = 'IN_PROGRESS';

    case RESOLVED = 'RESOLVED';

    public function getLabel(): string
    {
        return match ($this) {
            self::OPEN => 'open',
            self::CLOSED => 'closed',
            self::IN_PROGRESS => 'in_progress',
            self::RESOLVED => 'resolved',
        };
    }

    public static function values(): array {

        return collect(self::cases())
            ->map(fn ($status) => $status->value)
            ->toArray();

    }

}
