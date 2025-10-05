<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemorialPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users first
        $users = \App\Models\User::factory(3)->create();

        // Get templates
        $templates = \App\Models\MemorialTemplate::all();

        // Create memorial pages for each user
        foreach ($users as $user) {
            \App\Models\MemorialPage::factory()
                ->for($user)
                ->for($templates->random(), 'template')
                ->has(\App\Models\MemorialStory::factory(rand(1, 3)), 'stories')
                ->has(\App\Models\MemorialMedia::factory(rand(1, 5)), 'media')
                ->has(\App\Models\GuestbookEntry::factory(rand(2, 8)), 'guestbookEntries')
                ->create();
        }

        // Create a few more standalone memorial pages
        \App\Models\MemorialPage::factory(5)
            ->for(\App\Models\User::factory())
            ->for($templates->random(), 'template')
            ->has(\App\Models\MemorialStory::factory(rand(1, 4)), 'stories')
            ->has(\App\Models\MemorialMedia::factory(rand(2, 6)), 'media')
            ->has(\App\Models\GuestbookEntry::factory(rand(3, 10)), 'guestbookEntries')
            ->create();
    }
}
