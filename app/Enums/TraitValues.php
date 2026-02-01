<?php

namespace App\Enums;

trait TraitValues
{
    public static function values(): array {

        return collect(self::cases())
            ->map(fn ($status) => $status->value)
            ->toArray();

    }
}
