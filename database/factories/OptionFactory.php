<?php

namespace Database\Factories;

use App\Models\Onboarding;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Max 4 options per question
            'onboarding_id' => Onboarding::factory(),
//            'question_id' => $this->faker->numberBetween(2, 4),
            'title' => $this->faker->sentence,
        ];
    }
}
