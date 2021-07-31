<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create();
        \App\Models\Pets\Category::factory(5)->create();
        \App\Models\Pets\Breed::factory(5)->create();
        \App\Models\Pets\Pet::factory(24)->create();
    }
}