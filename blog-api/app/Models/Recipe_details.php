<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe_details extends Model
{
    use HasFactory;
    protected $primaryKey = 'recipe_detail_id';

    protected $fillable = [
        'recipe_id',
        'content1',
        'content2',
        'content3',
        'content4',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
