<?php

namespace Enterprise\Base\Database\Factories;

use Enterprise\Base\Models\User;
use Enterprise\Base\Models\UserCredential;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function username(): static
    {
        return $this->has(UserCredential::factory()->username(), 'credentials');
    }

    public function email(): static
    {
        return $this->has(UserCredential::factory()->email(), 'credentials');
    }

    public function phone(): static
    {
        return $this->has(UserCredential::factory()->phone(), 'credentials');
    }
}
