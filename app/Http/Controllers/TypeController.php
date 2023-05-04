<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Make;
use App\Models\Year;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getTypeModelMakeByYear(Request $request, Year $year, Make $make, CarModel $carModel)
    {
        return $carModel->types;
    }
}
