<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Team;
use App\Models\CreateMatch;


class MatchController extends Controller
{
    public function create()
    {
        $teams = Team::pluck('tname', 'id'); // Fetch all teams for the dropdown

        // Check if any teams already have matches scheduled in the database
        $teamsWithMatches = CreateMatch::pluck('team1_id')->merge(CreateMatch::pluck('team2_id'))->unique();
        $teams = $teams->except($teamsWithMatches->toArray());

        return view('Admin\pages\CreateTeams\createMatch', ['teams' => $teams]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
        ]);

        CreateMatch::create($validatedData);

        return redirect('/All-Schedule-Matches')->with('success', 'Match scheduled successfully!');
    }
    public function scheduledMatches(){
        $scheduledMatches = CreateMatch::select('create_matches.*', 'team1.tname as team1_name', 'team2.tname as team2_name')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->get();

        return view('Admin.pages.createTeams.scheduledMatches',compact('scheduledMatches'));
    }

    public function destroy($id)
    {
        // Find the match by ID
        $match = CreateMatch::find($id);

        // Check if the match exists
        if (!$match) {
            return redirect()->back()->with('error', 'Match not found!');
        }

        // Delete the match
        $match->delete();

        return redirect()->back()->with('success', 'Match deleted successfully!');
    }
}


