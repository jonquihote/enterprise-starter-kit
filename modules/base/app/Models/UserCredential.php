<?php

namespace Enterprise\Base\Models;

use Enterprise\Base\Database\Factories\UserCredentialFactory;
use Enterprise\Base\Enums\MigrationsEnum;
use Enterprise\Base\Enums\UserCredentialTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCredential extends Model
{
    use HasFactory;

    protected static string $factory = UserCredentialFactory::class;

    protected $fillable = [
        'user_id',

        'type',
        'value',
    ];

    public function getTable()
    {
        return MigrationsEnum::UserCredential->table();
    }

    protected function casts(): array
    {
        return [
            'type' => UserCredentialTypesEnum::class,

            'verified_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
