<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Recipes;
use App\Http\Requests\StoreRecipesRequest;
use App\Http\Requests\UpdateRecipesRequest;

use App\Http\Resources\RecipesResource;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;



class RecipesController extends Controller
{
    public function index()
    {
        return RecipesResource::collection(Recipes::all());
    }

    public function store(StoreRecipesRequest $request)
    {
        $recipes = Recipes::create($request->validated());

        return RecipesResource::make($recipes);
    }

    public function show(Recipes $recipe)
    {
        return RecipesResource::make($recipe);
    }

    public function update(UpdateRecipesRequest $request, Recipes $recipe)
    {
        $recipe->update($request->validated());

        return RecipesResource::make($recipe);
    }

    public function destroy(Recipes $recipe)
    {
        $recipe->delete();

        return response()->NoContent();
    }
}
