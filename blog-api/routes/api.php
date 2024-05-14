<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\RecipesController;
use App\Http\Controllers\API\V1\RecipeDetailsController;
use App\Http\Controllers\API\V1\CommentsController;
use App\Http\Controllers\API\V1\ContactController;
use App\Http\Controllers\API\V1\WorkshopsController;
use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\KeywordController;
use App\Http\Controllers\API\V1\SearchController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\CuisineController;
use App\Http\Controllers\API\CloudinaryController;
use App\Http\Controllers\API\V1\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::apiResource('/users', UserController::class);
    // Route::apiResource('/recipes', RecipesController::class);
    Route::apiResource('/recipe_details', RecipeDetailsController::class);
    Route::apiResource('/comments', CommentsController::class);
    Route::apiResource('/contact', ContactController::class);
    Route::apiResource('/workshops', WorkshopsController::class);
    Route::get('/recipes', [RecipesController::class, 'index']);
    Route::get('/recipes/{recipe}', [RecipesController::class, 'show']);

    Route::post('/auth/register', [LoginController::class, 'register']);
    Route::post('/auth/login', [LoginController::class, 'login']);
    Route::get('/recipes/keyword/{keyword}', [KeywordController::class, 'search']);
    Route::get('/recipes/search/{criteria}', [SearchController::class, 'search']);
    Route::get('/recipes/searchByName/{name}', [SearchController::class, 'searchByName']);
    Route::get('/recipes/category/{category}', [CategoryController::class, 'search']);
    Route::get('/recipes/cuisine/{cuisine}', [CuisineController::class, 'search']);
    Route::post('/upload', [CloudinaryController::class, 'upload']);
    Route::post('/createrecipe', [PostController::class, 'createPost']);
    Route::get('/loadrecipe/{recipe_name}', [PostController::class, 'loadPost']);
});

Route::middleware('auth:api')->group(function () {
    Route::patch('/v1/recipes/{recipe}', [RecipesController::class, 'update']);
    Route::delete('/v1/recipes/{recipe}', [RecipesController::class, 'destroy']);
});
