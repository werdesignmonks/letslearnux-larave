<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter_name' => fake()->word() . ' ' .fake()->numerify(),
            'title' => fake()->sentence(3),
            'sub_title' => fake()->sentence(1),
            'estimate_time' => fake()->numberBetween(1, 10),
            'slug' => fake()->slug(),
        ];
    }
}
