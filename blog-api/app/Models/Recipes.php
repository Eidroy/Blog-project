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
        'search_keywords',
    ];

    public function recipe_details()
    {
        return $this->hasOne(Recipe_details::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
