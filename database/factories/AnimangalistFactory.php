<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animangalist>
 */
class AnimangalistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'studio' => fake()->firstName() . 'Studio',
            'type' => fake()->randomElement(['Anime', 'Manga']),
            'synopsis' => fake()->paragraph(5, true),
            'ep_count' => fake()->numberBetween(1, 100),
        ];
    }
}
