<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'recipe_name',
        'creator',
        'likes',
        'timetocook',
        'timetoprepare',
        'category',
        'cuisine',
        'servings',
        'ingredients',
        'nutritional_values',
        'detail_id',
        'search_keywords',
    ];
}
