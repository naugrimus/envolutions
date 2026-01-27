<?php

namespace App\Enums;

enum Roles: string
{
    case AGENT = 'AGENT';
    case USER = 'USR';

    public function getLabel(): string
    {
        return match ($this) {
            self::USER => 'Standaard user',
            self::AGENT => 'Admin user',
        };
    }
}
