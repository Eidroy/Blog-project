<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;

class SearchController extends Controller
{
    public function search($criteria)
    {
        $recipes = Recipes::where(function ($query) use ($criteria) {
            $query->where('recipe_name', 'like', '%' . $criteria . '%')
            ->orWhere('category', 'like', '%' . $criteria . '%')
            ->orWhere('cuisine', 'like', '%' . $criteria . '%')
            ->orWhere('ingredients', 'like', '%' . $criteria . '%')
            ->orWhere('nutritional_values', 'like', '%' . $criteria . '%')
            ->orWhere('search_keywords', 'like', '%' . $criteria . '%');
        })->get();
        return response()->json($recipes);
    }

    public function searchByName($name)
    {
        $recipes = Recipes::where(function ($query) use ($name) {
            $query->where('recipe_name', '=', $name)
                ->orWhere('category', '=', $name)
                ->orWhere('cuisine', '=', $name);
        })->get();
        return response()->json($recipes);
    }
}
