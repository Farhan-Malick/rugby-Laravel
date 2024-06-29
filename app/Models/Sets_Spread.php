<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sets_Spread extends Model
{
    use HasFactory;
    protected $fillable = [
        'teams',
        'bonus_points',
    ];
    
}
