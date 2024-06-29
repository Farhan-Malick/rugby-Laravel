<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'match_date',
        'bonus_points_team1',
        'bonus_points_team2',
        'rounds'
    ];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
