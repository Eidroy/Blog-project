<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'Recipe_name',
        'creator',
        'likes',
        'TimetoCook',
        'Timetoprepare',
        'category',
        'Quisine',
        'servings',
        'ingredients',
        'Nutritional_values',
    ];
}
