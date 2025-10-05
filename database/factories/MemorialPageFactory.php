<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemorialPage>
 */
class MemorialPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $petNames = ['Buddy', 'Max', 'Bella', 'Luna', 'Charlie', 'Lucy', 'Cooper', 'Daisy', 'Milo', 'Molly', 'Oliver', 'Sophie', 'Tucker', 'Chloe', 'Rocky'];
        $petTypes = ['Dog', 'Cat', 'Bird', 'Rabbit', 'Hamster', 'Guinea Pig'];

        return [
            'user_id' => \App\Models\User::factory(),
            'template_id' => \App\Models\MemorialTemplate::factory(),
            'pet_name' => fake()->randomElement($petNames),
            'pet_type' => fake()->randomElement($petTypes),
            'breed' => fake()->words(2, true),
            'birth_date' => fake()->dateTimeBetween('-15 years', '-1 year'),
            'death_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'description' => fake()->paragraphs(3, true),
            'slug' => fake()->unique()->slug(),
            'is_published' => fake()->boolean(80),
            'view_count' => fake()->numberBetween(0, 500),
            'custom_settings' => [
                'show_birth_date' => fake()->boolean(90),
                'show_description' => fake()->boolean(95),
                'custom_css' => fake()->boolean(20) ? 'body { font-size: 1.1em; }' : null,
            ],
        ];
    }
}
