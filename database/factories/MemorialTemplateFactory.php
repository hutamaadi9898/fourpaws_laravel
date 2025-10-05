<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemorialTemplate>
 */
class MemorialTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true).' Template',
            'description' => fake()->sentence(),
            'template_data' => [
                'theme_color' => fake()->randomElement(['#1e40af', '#dc2626', '#059669', '#7c3aed', '#ea580c', '#0891b2']),
                'layout' => fake()->randomElement(['classic', 'modern', 'elegant', 'simple']),
                'settings' => [
                    'show_guestbook' => fake()->boolean(80),
                    'show_stories' => fake()->boolean(90),
                    'show_media' => fake()->boolean(95),
                    'font_family' => fake()->randomElement(['Inter', 'Georgia', 'Times New Roman']),
                    'background_type' => fake()->randomElement(['solid', 'gradient', 'image']),
                ],
            ],
            'is_active' => fake()->boolean(90),
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
