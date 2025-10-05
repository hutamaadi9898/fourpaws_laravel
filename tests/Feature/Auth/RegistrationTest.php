<?php

namespace Tests\Feature\Auth;

use App\Models\User;

it('renders the registration screen', function () {
    $response = $this->get(route('register'));

    $response->assertOk()->assertSee('Register');
});

it('registers new users', function () {
    $response = $this->post(route('register'), [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => true,
    ]);

    $response->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
});
