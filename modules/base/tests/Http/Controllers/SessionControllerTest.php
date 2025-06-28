<?php

use Enterprise\Base\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('can render login page', function () {
    $response = get(route('base::session.create'));

    $response->assertOk();
});

it('can authenticate user using email', function () {
    $user = User::factory()
        ->email()
        ->create();

    $data = [
        'login' => $user->credentials->first()->value,
        'password' => 'password',
    ];

    $response = post(route('base::session.store'), $data);

    $response->assertRedirect(route('base::pages.dashboard'));
});

it('can authenticate user using username', function () {
    $user = User::factory()
        ->username()
        ->create();

    $data = [
        'login' => $user->credentials->first()->value,
        'password' => 'password',
    ];

    $response = post(route('base::session.store'), $data);

    $response->assertRedirect(route('base::pages.dashboard'));
});

it('can authenticate user using phone', function () {
    $user = User::factory()
        ->phone()
        ->create();

    $data = [
        'login' => $user->credentials->first()->value,
        'password' => 'password',
    ];

    $response = post(route('base::session.store'), $data);

    $response->assertRedirect(route('base::pages.dashboard'));
});
