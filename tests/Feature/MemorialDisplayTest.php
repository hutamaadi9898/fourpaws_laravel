<?php

use App\Models\GuestbookEntry;
use App\Models\MemorialPage;
use App\Models\MemorialStory;
use App\Models\MemorialTemplate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('published memorial displays correctly', function () {
    $user = User::factory()->create(['name' => 'John Doe']);
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'pet_name' => 'Buddy',
        'pet_type' => 'Dog',
        'breed' => 'Golden Retriever',
        'description' => 'A loyal companion who brought joy to our family',
        'is_published' => true,
        'birth_date' => '2020-01-15',
        'death_date' => '2024-01-15',
    ]);

    $response = $this->get("/memorial/{$memorial->slug}");

    $response->assertSuccessful()
        ->assertSee('Buddy')
        ->assertSee('Golden Retriever')
        ->assertSee('Dog')
        ->assertSee('A loyal companion who brought joy to our family')
        ->assertSee('Memorial created by John Doe')
        ->assertSee('Jan 15, 2020 - Jan 15, 2024', false);
});

test('unpublished memorial returns 404', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => false,
    ]);

    $response = $this->get("/memorial/{$memorial->slug}");

    $response->assertNotFound();
});

test('memorial view count increments on visit', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => true,
        'view_count' => 5,
    ]);

    $this->get("/memorial/{$memorial->slug}");

    expect($memorial->fresh()->view_count)->toBe(6);
});

test('memorial displays guestbook entries', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create([
        'template_data' => [
            'theme_color' => '#1e40af',
            'layout' => 'classic',
            'settings' => [
                'show_guestbook' => true,
            ],
        ],
    ]);

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => true,
    ]);

    GuestbookEntry::factory()->create([
        'memorial_page_id' => $memorial->id,
        'visitor_name' => 'Sarah Johnson',
        'message' => 'Buddy was such a sweet dog. I will miss him dearly.',
        'is_approved' => true,
    ]);

    $response = $this->get("/memorial/{$memorial->slug}");

    $response->assertSuccessful()
        ->assertSee('Condolences')
        ->assertSee('Sarah Johnson')
        ->assertSee('Buddy was such a sweet dog. I will miss him dearly.');
});

test('memorial displays stories when available', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'is_published' => true,
    ]);

    MemorialStory::factory()->create([
        'memorial_page_id' => $memorial->id,
        'title' => 'First Day Home',
        'content' => 'I remember the day we brought Buddy home...',
        'author_name' => 'Family',
    ]);

    $response = $this->get("/memorial/{$memorial->slug}");

    $response->assertSuccessful()
        ->assertSee('Memories & Stories', false)
        ->assertSee('First Day Home')
        ->assertSeeText('I remember the day we brought Buddy home...')
        ->assertSeeText('Family');
});

test('memorial has proper SEO meta tags', function () {
    $user = User::factory()->create();
    $template = MemorialTemplate::factory()->create();

    $memorial = MemorialPage::factory()->create([
        'user_id' => $user->id,
        'template_id' => $template->id,
        'pet_name' => 'Buddy',
        'pet_type' => 'Dog',
        'is_published' => true,
    ]);

    $response = $this->get("/memorial/{$memorial->slug}");

    $response->assertSuccessful()
        ->assertSee('<title>Buddy - Memorial | Four Paws</title>', false)
        ->assertSee('meta name="description"', false)
        ->assertSee('meta property="og:title"', false)
        ->assertSee('meta name="twitter:card"', false);
});

test('nonexistent memorial returns 404', function () {
    $response = $this->get('/memorial/nonexistent-slug');

    $response->assertNotFound();
});
