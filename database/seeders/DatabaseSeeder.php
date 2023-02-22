<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Idea::factory(30)->create();
        Category::factory()->create([
            'name' => 'Category 1',
        ]);
        Category::factory()->create([
            'name' => 'Category 2',
        ]);
        Category::factory()->create([
            'name' => 'Category 3',
        ]);
        Category::factory()->create([
            'name' => 'Category 4',
        ]);
    }
}
