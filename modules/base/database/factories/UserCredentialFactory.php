<?php

namespace Enterprise\Base\Database\Factories;

use Enterprise\Base\Enums\UserCredentialTypesEnum;
use Enterprise\Base\Models\User;
use Enterprise\Base\Models\UserCredential;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserCredentialFactory extends Factory
{
    protected $model = UserCredential::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),

            'verified_at' => Carbon::now(),
        ];
    }

    public function username(?string $username = null): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserCredentialTypesEnum::USERNAME,
            'value' => $username ?? fake()->userName(),
        ]);
    }

    public function email(?string $email = null): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserCredentialTypesEnum::EMAIL,
            'value' => $email ?? fake()->safeEmail(),
        ]);
    }

    public function phone(?string $phone = null): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserCredentialTypesEnum::PHONE,
            'value' => $phone ?? fake()->e164PhoneNumber(),
        ]);
    }
}
