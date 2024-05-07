<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Recipe_details::factory(1)->create();

        \App\Models\Recipes::factory(1)->create();
        \App\Models\Comments::factory(1)->create();

    }
}
