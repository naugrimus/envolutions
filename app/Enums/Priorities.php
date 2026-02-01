<?php

namespace App\Enums;

enum Priorities: string
{
    use TraitValues;

    case LOW = 'LOW';
    case MEDIUM = 'MEDIUM';

    case HIGH = 'HIGH';

    public function getLabel(): string
    {
        return match ($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
        };
    }
}
