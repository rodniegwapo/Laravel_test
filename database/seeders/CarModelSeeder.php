<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carModels = [
            ['make_id' => 1, 'name' => 'Camry'],
            ['make_id' => 2, 'name' => 'CR-V'],
            ['make_id' => 3, 'name' => 'Silverado'],
            ['make_id' => 4, 'name' => 'Mustang'],
        ];

        foreach ($carModels as $model) {
            CarModel::create($model);
        }
    }
}
