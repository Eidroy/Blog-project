<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Recipe_details;
use App\Http\Requests\StoreRecipe_detailsRequest;
use App\Http\Requests\UpdateRecipe_detailsRequest;

use App\Http\Resources\Recipe_detailsResource;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class RecipeDetailsController extends Controller
{
    public function index()
    {
        return Recipe_detailsResource::collection(Recipe_details::all());
    }

    public function store(StoreRecipe_detailsRequest $request)
    {
        $recipe_details = Recipe_details::create($request->validated());

        return Recipe_detailsResource::make($recipe_details);
    }

    public function show(Recipe_details $recipe_detail)
    {
        return Recipe_detailsResource::make($recipe_detail);
    }

    public function update(UpdateRecipe_detailsRequest $request, Recipe_details $recipe_detail)
    {
        $recipe_detail->update($request->validated());

        return Recipe_detailsResource::make($recipe_detail);
    }

    public function destroy(Recipe_details $recipe_detail)
    {
        $recipe_detail->delete();

        return response()->NoContent();
    }
}
