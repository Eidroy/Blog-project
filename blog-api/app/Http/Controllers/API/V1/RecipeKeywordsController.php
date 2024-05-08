<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Recipes;

class RecipeKeywordsController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->input('keywords');
        $recipes = Recipes::where('search_keywords', 'like', '%' . $keywords . '%')->get();
        return response()->json($recipes);
    }
}
