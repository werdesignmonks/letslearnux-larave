<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chapters = [
            [
                'chapter_name' => 'Milestone 1',
                'title' => 'Getting started with basic check',
                'sub_title' => 'Expected Learning Outcomes: Learn how to create a Laravel 10 project',
                'estimate_time' => 10,
                'slug' => 'introduction-to-laravel-10',
            ],
            [
                'chapter_name' => 'Milestone 2',
                'title' => 'Learn & practice the tools',
                'sub_title' => 'Expected Learning Outcomes: Learn the basics of Laravel 10',
                'estimate_time' => 10,
                'slug' => 'laravel-10-fundamentals',
            ],
            [
                'chapter_name' => 'Milestone 3',
                'title' => 'Learn UI design with Figma',
                'sub_title' => 'Expected Learning Outcomes: Learn how to use Figma to create better projects',
                'estimate_time' => 10,
                'slug' => 'laravel-10-authentication',
            ],
            [
                'chapter_name' => 'Milestone 4',
                'title' => 'Practice, prepare and apply',
                'sub_title' => 'Expected Learning Outcomes: Learn how to implement authentication in Laravel 10',
                'estimate_time' => 10,
                'slug' => 'laravel-10-authorization',
            ]
        ];

        foreach ($chapters as $chapter) {
            Chapter::create(
                [
                    'chapter_name' => $chapter['chapter_name'],
                    'title' => $chapter['title'],
                    'sub_title' => $chapter['sub_title'],
                    'estimate_time' => $chapter['estimate_time'],
                    'slug' => $chapter['slug'],
                ]
            );
        }
    }
}
