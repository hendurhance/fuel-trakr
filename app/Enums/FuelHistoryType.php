<?php

namespace App\Enums;

enum FuelHistoryType: int
{
    case REFILL = 0;
    case CONSUMPTION = 1;

    public static function all(): array
    {
        return [
            self::REFILL,
            self::CONSUMPTION,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::REFILL => 'Refill',
            self::CONSUMPTION => 'Consumption',
            default => 'Unknown',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::REFILL => 'green',
            self::CONSUMPTION => 'red',
            default => 'gray',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::REFILL => 'fas fa-gas-pump',
            self::CONSUMPTION => 'fas fa-tachometer-alt',
            default => 'fas fa-question',
        };
    }
}