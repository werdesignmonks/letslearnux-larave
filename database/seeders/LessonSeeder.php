<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'custom_sl' => fake()->randomFloat(1, 1, 1),
                'title' => 'Figma for Developers',
                'description' => 'Learn how to use Figma to create better projects',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(2, 1, 2),
                'title' => 'Laravel 10 Fundamentals',
                'description' => 'Learn the basics of Laravel 10',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 3),
                'title' => 'Laravel 10 Authentication',
                'description' => 'Learn how to implement authentication in Laravel 10',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 1),
                'title' => 'Laravel 10 Authorization',
                'description' => 'Learn how to implement authorization in Laravel 10',
                'chapter_id' => 2,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 2),
                'title' => 'Laravel 10 Advanced',
                'description' => 'Learn advanced topics of Laravel 10',
                'chapter_id' => 2,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 3),
                'title' => 'Laravel 10 Testing',
                'description' => 'Learn how to test Laravel 10 applications',
                'chapter_id' => 2,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ]
        ];

        foreach ($lessons as $lesson) {
            Lesson::create(
                [
                    'custom_sl' => $lesson['custom_sl'],
                    'title' => $lesson['title'],
                    'description' => $lesson['description'],
                    'chapter_id' => $lesson['chapter_id'],
                    'like' => $lesson['like'],
                    'dislike' => $lesson['dislike'],
                    'slug' => $lesson['slug'],
                ]
            );
        }
    }
}
