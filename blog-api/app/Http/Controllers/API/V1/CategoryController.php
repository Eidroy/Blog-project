<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;

class CategoryController extends Controller
{
    public function search(Request $request, $category)
    {
        $recipes = Recipes::where('category', $category)->get();
        foreach ($recipes as $recipe) {
            $recipe->recipe_details = $recipe->recipe_details;
            $recipe->media = $recipe->media;
        }
        return response()->json($recipes);
    }
}
