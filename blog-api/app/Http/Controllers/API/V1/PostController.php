<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recipe_details;
use App\Models\Media;
use App\Models\Recipes;
use App\Http\Resources\Recipe_detailsResource;
use App\Http\Requests\StoreRecipeDetailsRequest;
use App\Http\Requests\StoreRecipesRequest;
use App\Http\Resources\RecipesResource;
use App\Http\Requests\CloudinaryStoreRequest;
use App\Http\Resources\MediaResource;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function createPost(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'recipes' => 'required|array',
            'recipe_details' => 'required|array',
            'media_files' => 'sometimes|array|max:4',
            'media_files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $recipeData = $request->recipes;
        $recipeData['ingredients'] = explode(', ', $recipeData['ingredients']);
        $recipeData['ingredients'] = json_encode($recipeData['ingredients']); 
        $recipeData['nutritional_values'] = explode(', ', $recipeData['nutritional_values']); 
        $recipeData['nutritional_values'] = json_encode($recipeData['nutritional_values']); 
        $recipeData['search_keywords'] = explode(', ', $recipeData['search_keywords']); 
        $recipeData['search_keywords'] = json_encode($recipeData['search_keywords']); 

        $recipe = new Recipes($recipeData);
        $recipe->save();
        
        $recipeDetailsData = $request->recipe_details;
        $recipeDetailsData['content'] = explode(', ', $recipeDetailsData['content']);
        // $recipeDetailsData['content'] = json_encode($recipeDetailsData['content']);
        $recipe->recipe_details()->create($recipeDetailsData);

        if ($request->has('media_files')) {
            $mediaFiles = $request->file('media_files');
            if ($mediaFiles !== null) {
                foreach ($mediaFiles as $file) {
                    $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
                    $media = new Media(['file_url' => $uploadedFileUrl]);
                    $recipe->media()->save($media);
                }
            }
        }

        return response()->json(['message' => 'Recipe created successfully'], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

    public function loadPost($recipe_name)
    {
        try {
            $recipe_name = str_replace('-', ' ', $recipe_name);

            $recipe = Recipes::where('recipe_name', 'LIKE', $recipe_name)->first();
            if (!$recipe) {
                return response()->json(['message' => 'Recipe not found'], 404);
            }

            return new RecipesResource($recipe->load('recipe_details', 'media'));
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
