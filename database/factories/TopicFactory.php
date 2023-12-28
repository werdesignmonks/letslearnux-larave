<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter_id' => Chapter::factory(),
            'topic_name' => fake()->sentence(),
            'short_description' => fake()->paragraph(5),
            'like' => fake()->numberBetween(1, 1000),
            'dislike' => fake()->numberBetween(1,20)
        ];
    }
}
