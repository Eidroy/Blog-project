<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe_details extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'recipes_id',
        'content',
    ];

    protected $casts = [
        'content' => 'string',
    ];

}
