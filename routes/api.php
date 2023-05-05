<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('years', [App\Http\Controllers\YearController::class, 'index']);
Route::get('years/{year}/makes', [App\Http\Controllers\MakeController::class, 'getMakesByYear']);
Route::get('years/{year}/makes/{make}/car-models', [App\Http\Controllers\CarModelController::class, 'getModelsMakeByYear'])->scopeBindings();
Route::get('years/{year}/makes/{make}/car-models/{carModel}/types', [App\Http\Controllers\TypeController::class, 'getTypeModelMakeByYear'])->scopeBindings();

Route::apiResource('cars', App\Http\Controllers\CarController::class);
