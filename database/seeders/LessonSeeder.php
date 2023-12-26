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
                'description' => 'FigJam is a new online whiteboard tool that helps teams ideate, brainstorm, and iterate together.',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(2, 1, 2),
                'title' => 'UI Design Fundamentals',
                'description' => 'UI design is a creative and ever-changing field that welcomes fresh ideas from new practitioners, but there are some foundational UI design principles that every new designer should understand.',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 3),
                'title' => 'UI/UX Design with Figma',
                'description' => 'Learn how to implement authentication in Laravel 10',
                'chapter_id' => 1,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 1),
                'title' => 'Product Design Roadmap',
                'description' => 'Product design is the process of identifying a market opportunity, clearly defining the problem, developing a proper solution for that problem and validating the solution with real users.',
                'chapter_id' => 2,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 2),
                'title' => 'How to get Remote Jobs',
                'description' => 'Remote work is a working style that allows professionals to work outside of a traditional office environment. It is based on the concept that work does not need to be done in a specific place to be executed successfully.',
                'chapter_id' => 2,
                'like' => fake()->numberBetween(1, 1000),
                'dislike' => fake()->numberBetween(1,20),
                'slug' => fake()->slug(),
            ],
            [
                'custom_sl' => fake()->randomFloat(1, 1, 3),
                'title' => 'UX Job Interview Questions',
                'description' => 'UX design is a creative and ever-changing field that welcomes fresh ideas from new practitioners, but there are some foundational UX design principles that every new designer should understand.',
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
