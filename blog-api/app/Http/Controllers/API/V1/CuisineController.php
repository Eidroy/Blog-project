<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;

class CuisineController extends Controller
{
    public function search (Request $request, $cuisine) {
        $recipes = Recipes::where('cuisine', $cuisine)->get();
        return response()->json($recipes);
    }
}
