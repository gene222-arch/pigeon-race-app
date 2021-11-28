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
        'speed_per_minute',
        'leg_1_meter_per_minute',
        'leg_2_meter_per_minute',
        'leg_3_meter_per_minute'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
