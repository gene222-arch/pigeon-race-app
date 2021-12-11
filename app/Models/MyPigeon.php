<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPigeon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'ring_band',
        'gender',
        'color',
        'remarks',
        'bloodline',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($myPigeon) {
            $myPigeon->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
