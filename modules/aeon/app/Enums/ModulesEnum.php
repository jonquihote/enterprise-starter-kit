<?php

namespace Enterprise\Aeon\Enums;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

enum ModulesEnum
{
    case BASE;

    public function title(): string
    {
        return match ($this) {
            self::BASE => self::BASE->stringable()->title()->toString(),
        };
    }

    public function slug(): string
    {
        return match ($this) {
            self::BASE => self::BASE->stringable()->slug()->toString(),
        };
    }

    public function stringable(): Stringable
    {
        return match ($this) {
            self::BASE => Str::of($this->name)
        };
    }
}
