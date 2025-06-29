<?php

namespace App\Enums;

enum TaskStatus: int
{
    case FINISHED = 1;
    case DOING = 2;
    case UNFINISHED = 3;

    public function farsi(): string
    {
        return match ($this) {
            self::FINISHED => 'تمام شده',
            self::DOING => 'در حال انجام',
            self::UNFINISHED => 'تمام نشده',
        };
    }
}
