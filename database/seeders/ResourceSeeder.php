<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $resources = [
            [
                'title' => 'How to create a Laravel 10 project',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 1,
                'lesson_id' => 1,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'How to create SQL queries',
                'type' => 'article',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 2,
                'lesson_id' => 2,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'Latest Laravel 10 features',
                'type' => 'article',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 1,
                'lesson_id' => 1,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'Service Oriented Architecture in Laravel',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 2,
                'lesson_id' => 2,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'How to work Middleware in Laravel',
                'type' => 'article',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 1,
                'lesson_id' => 1,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'How to create a Laravel 10 project',
                'type' => 'book',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 2,
                'lesson_id' => 2,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'How to create a Laravel 10 project',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=QJ6DwH1gJUQ',
                'user_id' => 2,
                'lesson_id' => 2,
                'status' => 'approved',
                'image' => 'https://picsum.photos/200/300',
            ]

        ];

        foreach ($resources as $resource) {
            Resource::create(
                [
                    'title' => $resource['title'],
                    'type' => $resource['type'],
                    'url' => $resource['url'],
                    'user_id' => $resource['user_id'],
                    'lesson_id' => $resource['lesson_id'],
                    'status' => $resource['status'],
                    'image' => $resource['image'],
                ]
            );
        }
    }
}
