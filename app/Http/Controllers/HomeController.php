<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use App\Models\CreateMatch;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $users = User::has('picks')->get();

    $matches = Announcement::select(
        'announcements.*',
        'create_matches.team1_id',
        'team1.tname as team1_name',
        'team2.tname as team2_name',
        'teams.tname as winnerTeam',
        'create_matches.bonus_points_team1',
        'create_matches.bonus_points_team2'
    )
    ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
    ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
    ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
    ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
    ->get();

    // Add losing team information to the matches collection
    foreach ($matches as $match) {
        if ($match->winnerTeam == $match->team1_name) {
            $match->loserTeam = $match->team2_name;
        } else {
            $match->loserTeam = $match->team1_name;
        }
    }

    return view('user.index', compact('users', 'matches'));
}

public function detail($pool_id)
{
    $user = auth()->user();
        $setPools = $user->setPools;
        $join_pool= $user->joinPools;

        $scheduledMatches = CreateMatch::select(
            'create_matches.*',
            'team1.tname as team1_name',
            'team1.thumbnail as team1_image',
            'team2.tname as team2_name',
            'team2.thumbnail as team2_image'
        )
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->get();

        $matchesByRoundPicks = $scheduledMatches->groupBy('rounds');
    // Fetch users who have picks
    $users = User::has('picks')->with('picks')->get();

    // Fetch all announcements with match details and teams
    $matches = Announcement::select(
        'announcements.*',
        'create_matches.team1_id',
        'team1.tname as team1_name',
        'team2.tname as team2_name',
        'teams.tname as winnerTeam',
        'create_matches.bonus_points_team1',
        'create_matches.bonus_points_team2',
        'create_matches.rounds'
    )
    ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
    ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
    ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
    ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
    ->get();

    // Add losing team information to the matches collection
    foreach ($matches as $match) {
        if ($match->winnerTeam == $match->team1_name) {
            $match->loserTeam = $match->team2_name;
        } else {
            $match->loserTeam = $match->team1_name;
        }
    }

    // Group matches by rounds from create_matches table
    $matchesByRound = $matches->groupBy('rounds');

    return view('user.completeDetail', compact('pool_id','users', 'matchesByRound','setPools', 'user', 'matchesByRoundPicks','join_pool'));
}



// public function detail()
// {
//     // Fetch users who have picks
//     $users = User::has('picks')->get();

//     // Fetch all announcements with match details and teams
//     $matches = Announcement::select(
//         'announcements.*',
//         'create_matches.team1_id',
//         'team1.tname as team1_name',
//         'team2.tname as team2_name',
//         'teams.tname as winnerTeam',
//         'create_matches.bonus_points_team1',
//         'create_matches.bonus_points_team2',
//         'create_matches.rounds' // Include rounds from create_matches table
//     )
//     ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
//     ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
//     ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
//     ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
//     ->get();

//     // Add losing team information to the matches collection
//     foreach ($matches as $match) {
//         if ($match->winnerTeam == $match->team1_name) {
//             $match->loserTeam = $match->team2_name;
//         } else {
//             $match->loserTeam = $match->team1_name;
//         }
//     }

//     // Group matches by rounds from create_matches table
//     $matchesByRound = $matches->groupBy('rounds');

//     return view('user.completeDetail', compact('users', 'matchesByRound'));
// }



}
