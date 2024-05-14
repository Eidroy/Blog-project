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
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $uploadedFile = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'foodblog',
                'public_id' => pathinfo($fileName, PATHINFO_FILENAME)
            ]);
            if ($uploadedFile->getPublicId()) {
                Media::create([
                    'file_url' => $uploadedFile->getSecurePath(),
                    'file_name' => $fileName,
                    'file_type' => $uploadedFile->getFileType(),
                    'medially_id' => $recipe->id,
                    'medially_type' => $uploadedFile->getFileType(),
                    'size' => $uploadedFile->getSize(),
                    'recipes_id' => $recipe->id
                ]);
            }
        }


        Recipe_details::create([
            'recipes_id' => $recipe->id,
            'content1' => $validatedData['recipe_details']['content1'],
            'content2' => $validatedData['recipe_details']['content2'],
            'content3' => $validatedData['recipe_details']['content3'],
            'content4' => $validatedData['recipe_details']['content4'],
        ]);

        return new RecipesResource($recipe->load('recipe_details', 'media'));
      
    }

    public function loadPost($recipe_name)
    {
        try {
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
