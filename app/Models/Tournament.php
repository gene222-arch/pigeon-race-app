<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'is_public',
        'club_name',
        'remarks',
        'legs',
        'birds_count'
    ];

    public function details()
    {
        return $this->hasMany(TournamentDetail::class);
    }
}
