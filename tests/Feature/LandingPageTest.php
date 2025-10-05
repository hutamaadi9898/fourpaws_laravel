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

test('landing page displays featured memorials when available', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'pet_name' => 'Buddy',
        'pet_type' => 'Dog',
        'is_published' => true,
    ]);

    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Buddy')
        ->assertSee('Dog');
});

test('landing page displays memorial templates', function () {
    $template = MemorialTemplate::factory()->create([
        'name' => 'Classic Memorial',
        'description' => 'A timeless design for your beloved pet',
        'is_active' => true,
    ]);

    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Classic Memorial')
        ->assertSee('A timeless design for your beloved pet');
});

test('landing page shows statistics', function () {
    // Create some sample data
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    MemorialPage::factory()->count(3)->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => true,
    ]);

    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('3'); // Should show the count of memorials
});

test('landing page navigation works', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Four Paws')
        ->assertSee('Sign In')
        ->assertSee('Get Started');
});

test('landing page has proper SEO elements', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('<title>Four Paws - Pet Memorial Service</title>', false)
        ->assertSee('meta name="description"', false)
        ->assertSee('og:title', false)
        ->assertSee('twitter:card', false);
});
