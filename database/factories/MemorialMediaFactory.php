<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemorialMedia>
 */
class MemorialMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mediaType = fake()->randomElement(['image', 'video']);

        return [
            'memorial_page_id' => \App\Models\MemorialPage::factory(),
            'media_type' => $mediaType,
            'original_filename' => $mediaType === 'image'
                ? fake()->words(2, true).'.jpg'
                : fake()->words(2, true).'.mp4',
            'file_path' => 'memorial-media/'.fake()->uuid().($mediaType === 'image' ? '.jpg' : '.mp4'),
            'file_size' => fake()->numberBetween(500000, 10000000), // 500KB to 10MB
            'mime_type' => $mediaType === 'image' ? 'image/jpeg' : 'video/mp4',
            'alt_text' => fake()->sentence(),
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }

    public function image(): static
    {
        return $this->state(fn (array $attributes) => [
            'media_type' => 'image',
            'original_filename' => fake()->words(2, true).'.jpg',
            'file_path' => 'memorial-media/'.fake()->uuid().'.jpg',
            'mime_type' => 'image/jpeg',
        ]);
    }

    public function video(): static
    {
        return $this->state(fn (array $attributes) => [
            'media_type' => 'video',
            'original_filename' => fake()->words(2, true).'.mp4',
            'file_path' => 'memorial-media/'.fake()->uuid().'.mp4',
            'mime_type' => 'video/mp4',
        ]);
    }
}
