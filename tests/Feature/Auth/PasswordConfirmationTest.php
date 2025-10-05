<?php

namespace Tests\Feature\Auth;

use App\Models\User;

it('renders the confirm password screen', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('password.confirm'));

    $response->assertOk()->assertSee('This is a secure area of the application', false);
});

it('confirms the user password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    $this->actingAs($user)
        ->post(route('password.confirm'), [
            'password' => 'password',
        ])
        ->assertRedirect();

    $this->assertAuthenticated();
});

it('rejects an invalid confirmation password', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('password.confirm'))
        ->post(route('password.confirm'), [
            'password' => 'wrong-password',
        ])
        ->assertRedirect(route('password.confirm'))
        ->assertSessionHasErrors('password');
});
