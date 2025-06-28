<?php

namespace Enterprise\Aeon\Enums;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

enum ModulesEnum
{
    case BASE;

    public function title(): Stringable
    {
        return match ($this) {
            self::BASE => self::BASE->stringable()->title(),
        };
    }

    public function slug(): Stringable
    {
        return match ($this) {
            self::BASE => self::BASE->stringable()->slug(),
        };
    }

    public function stringable(): Stringable
    {
        return match ($this) {
            self::BASE => Str::of($this->name)
        };
    }
}
