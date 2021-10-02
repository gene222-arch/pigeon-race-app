<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeGenerator extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'is_used'
    ];
}
