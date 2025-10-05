<?php

use App\Models\MemorialPage;
use App\Models\MemorialTemplate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('landing page route exists', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
});

test('landing page loads successfully', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Hold onto the love.', false)
        ->assertSee('Share the story forever.', false);
});

test('landing page displays create memorial section', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Start a memorial', false)
        ->assertSee('Browse memorials', false)
        ->assertSee('Memorial gallery', false);
});

test('landing page shows statistics', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    MemorialPage::factory()->count(3)->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => true,
    ]);

    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee(number_format(3), false);
});

test('landing page navigation works', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Four Paws', false)
        ->assertSee('Sign in', false)
        ->assertSee('Create Memorial', false);
});

test('landing page has proper SEO elements', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('&mdash; Honoring Pet Memories Forever</title>', false)
        ->assertSee('meta name="description"', false)
        ->assertSee('og:title', false)
        ->assertSee('twitter:card', false);
});
