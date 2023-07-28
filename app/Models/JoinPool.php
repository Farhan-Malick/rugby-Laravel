<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinPool extends Model
{
    use HasFactory;

    protected $fillable = ['pool_id','pool_name'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
