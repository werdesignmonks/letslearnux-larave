<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Lesson;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['video', 'article', 'book']),
            'url' => $this->faker->url,
            'user_id' => User::factory(),
            'lesson_id' => Lesson::factory(),
            'status' => $this->faker->randomElement(['approved', 'draft', 'rejected']),
            'image' => 'https://picsum.photos/200/300',
        ];
    }
}
