<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coordinate_id',
        'loft_name',
        'phone',
        'address'
    ];

    public $timestamps = false;

    public function coordinate()
    {
        return $this->belongsTo(Coordinate::class);
    }
}
