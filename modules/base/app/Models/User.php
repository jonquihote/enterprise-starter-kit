<?php

namespace Enterprise\Base\Models;

use Enterprise\Base\Database\Factories\UserFactory;
use Enterprise\Base\Enums\MigrationsEnum;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected static string $factory = UserFactory::class;

    protected $fillable = [
        'password',
    ];

    public function getTable(): string
    {
        return MigrationsEnum::User->table();
    }

    public function credentials(): HasMany
    {
        return $this->hasMany(UserCredential::class);
    }
}
