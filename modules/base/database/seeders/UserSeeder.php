<?php

namespace Enterprise\Base\Database\Seeders;

use Enterprise\Base\Models\User;
use Enterprise\Base\Models\UserCredential;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->has(UserCredential::factory()->username('zeus'), 'credentials')
            ->has(UserCredential::factory()->email('zeus@example.com'), 'credentials')
            ->create();

        User::factory()
            ->has(UserCredential::factory()->email(), 'credentials')
            ->count(10)
            ->create();
    }
}
