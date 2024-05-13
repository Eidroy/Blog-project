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
        $request->validate([
            'recipe' => 'required|array',
            'recipe_details' => 'required|array',
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recipe = Recipes::create([
            'Recipe_name' => $recipe->Recipe_name,
            'creator' => $recipe->creator,
            'ingredients' => $recipe->ingredients,
            'likes' => $recipe->likes,
            'timetocook' => $recipe->timetocook,
            'Timetoprepare' => $recipe->Timetoprepare,
            'category' => $recipe->category,
            'cuisine' => $recipe->cuisine,
            'servings' => $recipe->servings,
            'nutritional_values' => $recipe->nutritional_values,
            'detail_id' => $recipe->detail_id,
            'search_keywords' => $recipe->search_keywords,
        ]);

        $recipeDetails = RecipeDetails::create([
            'content1' => $recipeDetails->content1,
            'content2' => $recipeDetails->content2,
            'content3' => $recipeDetails->content3,
            'content4' => $recipeDetails->content4,
            'image1' => $media->file_url,
            'image2' => $media->file_url,
            'image3' => $media->file_url,
            'image4' => $media->file_url,
        ]);

        $media = [];
        foreach ($request->file('media') as $file) {
            $image_name = time(). '.' . $file->getClientOriginalExtension();

            try {
                $cloudinaryImage = Cloudinary::upload($file->getRealPath(), [
                    'public_id' => $image_name,
                    'folder' => 'foodblog'
                ]);

                $media[] = Media::create([
                    'file_name' => $image_name,
                    'medially_id' => 1,
                    'medially_type' => $file->getClientMimeType(),
                    'file_url' => $cloudinaryImage->getSecurePath($image_name),
                    'file_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ]);
                


            } catch (\Exception $e) {
                \Log::error($e->getMessage());

                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to upload image',
                    'data' => [$e]
                ]);
            }
        }

        return response()->json([
            'recipe' => new RecipesResource($recipe),
            'recipe_details' => new RecipeDetailsResource($recipeDetails),
            'media' => MediaResource::collection($media),
        ]);
    }
}
