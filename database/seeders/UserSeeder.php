<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@designmonks.co',
            'password' => bcrypt('admin@2024'),
            'role' => 'admin',
            // User Name Auto Generate
            'username' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Mominul Islam',
            'email' => 'hello@mominul.me',
            'password' => bcrypt('admin@2024'),
            'role' => 'user',
            'username' => 'mominul'
        ]);
    }
}
