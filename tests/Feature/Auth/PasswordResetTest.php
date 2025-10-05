<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

it('renders the password reset request screen', function () {
    $response = $this->get(route('password.request'));

    $response->assertOk()->assertSee('Forgot your password?');
});

it('sends reset links to valid users', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(route('password.email'), [
        'email' => $user->email,
    ])->assertStatus(302);

    Notification::assertSentTo($user, ResetPassword::class);
});

it('renders the password reset form', function () {
    $user = User::factory()->create();
    $token = Str::random(60);

    $response = $this->get(route('password.reset', ['token' => $token, 'email' => $user->email]));

    $response->assertOk()->assertSee('Reset Password');
});

it('resets passwords with valid token', function () {
    $user = User::factory()->create([
        'password' => bcrypt('old-password'),
    ]);

    $token = Password::broker()->createToken($user);

    $this->post(route('password.update'), [
        'token' => $token,
        'email' => $user->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ])->assertRedirect(route('login'));

    $this->assertTrue(password_verify('new-password', $user->fresh()->password));
});
