<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'custom_sl' => fake()->randomFloat(2, 1, 5),
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(4),
            'chapter_id' => Chapter::factory(),
            'like' => fake()->numberBetween(1, 1000),
            'dislike' => fake()->numberBetween(1,20),
            'slug' => fake()->slug(),
        ];
    }
}
