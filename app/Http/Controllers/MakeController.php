<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    public function getMakesByYear(Request $request, Year $year)
    {
        return $year->makes;
    }
}
