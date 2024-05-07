<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'PhoneNO',
        'contact_content',
        'TypeOfQuery',
    ];
}
