<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'name',
        'current_balance',
        'entry_fee_reversal',
        'club_coordinates',
        'player_coordinates',
        'address',
        'country',
        'status'
    ];
}
