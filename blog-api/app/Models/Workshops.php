<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshops extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'workshop_name',
        'hosted_by',
        'country',
        'firstname',
        'lastname',
        'contact',
        'user_email',
        'user_id',
        'date',
        'time',
        'attendees',
        'payment',
    ];
}
