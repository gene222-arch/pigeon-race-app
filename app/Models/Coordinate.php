<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coordinate',
        'distance_in_km'
    ];
}
