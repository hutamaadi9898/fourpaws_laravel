<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemorialStory>
 */
class MemorialStoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storyTitles = [
            'First Day Home',
            'Best Friend Forever',
            'Park Adventures',
            'Favorite Toy',
            'Morning Routine',
            'Holiday Memories',
            'Funny Habits',
            'Special Bond',
            'Last Good Day',
            'Always Remembered',
        ];

        return [
            'memorial_page_id' => \App\Models\MemorialPage::factory(),
            'title' => fake()->randomElement($storyTitles),
            'content' => fake()->paragraphs(fake()->numberBetween(2, 5), true),
            'author_name' => fake()->name(),
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
