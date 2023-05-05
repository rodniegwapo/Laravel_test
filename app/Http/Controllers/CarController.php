<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->search($search);
            })
            ->when($request->input('year'), function ($query, $year) {
                $query->where('year_id', $year);
            })->when($request->input('make'), function ($query, $make) {
                $query->where('make_id', $make);
            })->when($request->input('model'), function ($query, $model) {
                $query->where('car_model_id', $model);
            })->when($request->input('type'), function ($query, $type) {
                $query->where('type_id', $type);
            })
            ->with(['year:id,year', 'make:id,name', 'carModel:id,name', 'type:id,type']);

        $data = $request->page ? $cars->paginate(10) : $cars->get();

        return CarResource::collection($data);
    }

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
            'year_id' => 'nullable|integer',
            'make_id' => 'nullable|integer',
            'car_model_id' => 'required|integer',
            'type_id' => 'required|integer',
        ]);
    }
}
