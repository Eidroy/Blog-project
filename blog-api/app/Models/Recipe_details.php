<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe_details extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'recipe_id',
        'content1',
        'content2',
        'content3',
        'content4',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }

}
