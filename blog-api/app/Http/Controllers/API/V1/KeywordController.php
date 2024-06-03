<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    public function search($keyword)
    {
        $recipes = Recipes::where('search_keywords', 'like', '%' . $keyword . '%')->get();
        return response()->json($recipes);
    }
}
