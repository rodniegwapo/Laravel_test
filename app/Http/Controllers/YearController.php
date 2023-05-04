<?php

namespace App\Http\Controllers;

use App\Http\Resources\YearResource;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index(Request $request)
    {
        $years = $request->input('page') ? Year::paginate(10) : Year::get();

        return YearResource::collection($years);
    }
}
