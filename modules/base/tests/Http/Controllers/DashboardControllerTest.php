<?php

use Enterprise\Base\Models\User;

use function Pest\Laravel\actingAs;

it('can render dashboard page', function () {
    $user = User::factory()->create();

    $response = actingAs($user)
        ->get(route('base::screens.dashboard'));

    $response->assertOk();
});
