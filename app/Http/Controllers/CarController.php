<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Car::create($data);

        return response()->noContent(200);
    }

    public function update(Request $request, Car $car)
    {
        $data = $this->validateData($request);

        $car->update($data);
    }

    private function validateData($request)
    {
        return $request->validate([
            'vin' => 'required|string|unique:cars,vin,'.$request->id,
            'year_id' => 'required|integer',
            'make_id' => 'required|integer',
            'car_model_id' => 'required|integer',
            'type_id' => 'required|integer',
        ]);
    }
}
