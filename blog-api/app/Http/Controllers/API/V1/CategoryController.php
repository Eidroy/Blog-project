<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;

class CategoryController extends Controller
{
    public function search (Request $request, $category) {
        $recipes = Recipes::where('category', $category)->get();
        return response()->json($recipes);
    }
}
