<?php

namespace Enterprise\Base\Enums;

enum MigrationsEnum
{
    case User;
    case UserCredential;

    public function table(): string
    {
        return match ($this) {
            self::User => 'base_users',
            self::UserCredential => 'base_user_credentials',
        };
    }
}
