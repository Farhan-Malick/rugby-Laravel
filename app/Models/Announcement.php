<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'winning_team_id',
        'winnerTeam',
        'looserTeam',
        'winner',
        'looser',
        'status'
    ];

    public function match()
    {
        return $this->belongsTo(CreateMatch::class, 'match_id');
    }

    public function winningTeam()
    {
        return $this->belongsTo(Team::class, 'winning_team_id');
    }
}
