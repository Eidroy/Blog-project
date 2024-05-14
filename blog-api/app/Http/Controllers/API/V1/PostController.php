<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RecipeDetails;
use App\Models\Media;
use App\Models\Recipes;
use App\Http\Resources\RecipeDetailsResource;
use App\Http\Requests\StoreRecipeDetailsRequest;
use App\Http\Requests\StoreRecipesRequest;
use App\Http\Resources\RecipesResource;
use App\Http\Requests\CloudinaryStoreRequest;
use App\Http\Resources\MediaResource;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'recipes' => 'required|array',
            'recipe_details' => 'required|array',
            'media_files' => 'required|array|max:4',
            'media_files.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $ingredients = explode(", ", $validatedData['recipes']['ingredients']);
        $validatedData['recipes']['ingredients'] = json_encode($ingredients);
        
        $nutritional_values = explode(", ", $validatedData['recipes']['nutritional_values']);
        $formatted_nutritional_values = [];
        foreach ($nutritional_values as $value) {
            list($key, $val) = explode(":", $value);
            $formatted_nutritional_values[$key] = $val;
        }
        $validatedData['recipes']['nutritional_values'] = json_encode($formatted_nutritional_values);
        
        $search_keywords = explode(", ", $validatedData['recipes']['search_keywords']);
        $validatedData['recipes']['search_keywords'] = json_encode($search_keywords);


        $recipe = Recipes::create([
            'recipe_name' => $validatedData['recipes']['recipe_name'],
            'creator' => $validatedData['recipes']['creator'],
            'likes' => $validatedData['recipes']['likes'],
            'timetocook' => $validatedData['recipes']['timetocook'],
            'timetoprepare' => $validatedData['recipes']['timetoprepare'],
            'category' => $validatedData['recipes']['category'],
            'cuisine' => $validatedData['recipes']['cuisine'],
            'servings' => $validatedData['recipes']['servings'],
            'nutritional_values' => $validatedData['recipes']['nutritional_values'],
            'search_keywords' => $validatedData['recipes']['search_keywords'],
            'ingredients' => $validatedData['recipes']['ingredients']  
        ]);

        $mediaFiles = $request->file('media_files');
        foreach ($mediaFiles as $file) {
            $uploadResult = $file->storeOnCloudinary('recipe_images');
            if ($uploadResult->getPublicId()) {
                Media::create([
                    'file_url' => $uploadResult->getSecurePath(),
                    'file_name' => $uploadResult->getFilename(),
                    'file_type' => $uploadResult->getFileType(),
                    'size' => $uploadResult->getFileSize(),
                    'recipe_id' => $recipe->id
                ]);
            }
        }

        RecipeDetails::create([
            'recipe_id' => $recipe->id,
            'content1' => $validatedData['recipe_details']['content1'],
            'content2' => $validatedData['recipe_details']['content2'],
            'content3' => $validatedData['recipe_details']['content3'],
            'content4' => $validatedData['recipe_details']['content4'],
        ]);

        return new RecipesResource($recipe->load('details', 'media'));
      
    }

    public function loadPost (Request $request)
    {
        $recipeName = $request->input('recipe_name');
        $recipe = Recipes::where('recipe_name', $recipeName)->first();
        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }
        return new RecipesResource($recipe->load('details', 'media'));
    }
}
