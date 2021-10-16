<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'user_id',
        'points',
        'speed_per_miniute',
        'leg_1_meter_per',
        'leg_2_meter_per',
        'leg_3_meter_per'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
