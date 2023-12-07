<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com'
        ]);

        Admin::factory()->create([
            'name' => 'Mominul Islam',
            'email' => 'mominul@test.com'
        ]);

//        Admin::factory()->count(5)->create();
    }
}
