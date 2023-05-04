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
        $this->call([
            YearSeeder::class,
            MakeSeeder::class,
            CarModelSeeder::class,
            TypeSeeder::class,
        ]);
    }
}
