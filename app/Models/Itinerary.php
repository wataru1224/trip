<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //use HasFactory;
    protected $fillable = [
        'date',
        'destination',
        'contents',
        'trip_id',
        'image',
    ];
}
