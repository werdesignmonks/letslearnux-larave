<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
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
            'type' => $this->faker->randomElement(['video', 'article', 'book', 'other']),
            'url' => $this->faker->url,
            'user_id' => Admin::factory(),
            'status' => $this->faker->randomElement(['approved', 'pending', 'rejected']),
            'image' => 'https://picsum.photos/200/300',
        ];
    }
}