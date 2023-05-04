<?php

namespace Database\Seeders;

use App\Models\Make;
use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makes = [
            ['year_id' => 1, 'name' => 'Toyota'],
            ['year_id' => 2, 'name' => 'Honda'],
            ['year_id' => 3, 'name' => 'Mitsubishi'],
            ['year_id' => 4, 'name' => 'Mustang'],
        ];

        foreach ($makes as $make) {
            Make::create($make);
        }
    }
}
