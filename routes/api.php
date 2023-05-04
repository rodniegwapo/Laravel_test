<?php

use App\Http\Controllers\MakeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\YearController;
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

Route::get('years', [YearController::class, 'index']);
Route::get('years/{year}/makes', [MakeController::class, 'getMakesByYear']);
Route::get('years/{year}/makes/{make}/model', [ModelController::class, 'getModelsMakeByYear'])->scopeBindings();
Route::get('years/{year}/makes/{make}/car-models/{carModel}/types', [TypeController::class, 'getTypeModelMakeByYear'])->scopeBindings();
