<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\Year;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function getModelsMakeByYear(Request $request, Year $year, Make $make)
    {
        $models = $make->carModels;

        return $models;
    }
}
