<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Media extends Model
{

    use HasFactory;
    use MediaAlly;

    protected $fillable = [
        'recipes_id',
        'medially_id',
        'medially_type',
        'file_url',
        'file_name',
        'file_type',
        'size'
    ];
}
