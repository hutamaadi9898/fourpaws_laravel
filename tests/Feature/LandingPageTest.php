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
        ->assertSee('Recent Memorials')
        ->assertSee('Create Memorial');
});

test('landing page displays create memorial section', function () {
    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Create Memorial')
        ->assertSee('Honor Your')
        ->assertSee("Beloved Pet's Memory", false);
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
        ->assertSee('<title>Four Paws - Honoring Pet Memories Forever</title>', false)
        ->assertSee('meta name="description"', false)
        ->assertSee('og:title', false)
        ->assertSee('twitter:card', false);
});
