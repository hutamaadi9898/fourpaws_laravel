<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuestbookEntry>
 */
class GuestbookEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $messages = [
            'So sorry for your loss. {pet_name} was such a wonderful companion.',
            'My heart goes out to you during this difficult time. {pet_name} will be deeply missed.',
            'What a beautiful soul {pet_name} was. Sending you love and comfort.',
            'I have such fond memories of {pet_name}. Thank you for sharing your precious friend with us.',
            'Rest in peace, sweet {pet_name}. You brought so much joy to everyone who knew you.',
            '{pet_name} was lucky to have such a loving family. My thoughts are with you.',
            'The love you shared with {pet_name} was truly special. Keeping you in my prayers.',
            'No words can ease the pain, but please know that {pet_name}\'s memory will live on forever.',
        ];

        return [
            'memorial_page_id' => \App\Models\MemorialPage::factory(),
            'visitor_name' => fake()->name(),
            'visitor_email' => fake()->safeEmail(),
            'message' => fake()->randomElement($messages),
            'is_approved' => fake()->boolean(85),
        ];
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_approved' => true,
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_approved' => false,
        ]);
    }
}
