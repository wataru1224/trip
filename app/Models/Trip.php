<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'user_id',
        'is_public',
    ];
}
