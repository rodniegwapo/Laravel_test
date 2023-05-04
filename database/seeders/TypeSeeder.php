<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['car_model_id' => 1, 'type' => 'Sedan'],
            ['car_model_id' => 2, 'type' => 'SUV'],
            ['car_model_id' => 3, 'type' => 'Coupe'],
            ['car_model_id' => 4, 'type' => 'Truck'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
