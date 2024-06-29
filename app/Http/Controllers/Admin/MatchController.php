<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Team;
use App\Models\CreateMatch;
use App\Models\User;
use App\Models\Announcement; 
use App\Models\Sets_Spread; 
use Illuminate\Support\Facades\Log;





class MatchController extends Controller
{
    public function create()
{
    $teams = Team::pluck('tname', 'id');
    $matches = CreateMatch::all(); // Get all matches
    return view('Admin.pages.CreateTeams.createMatch', ['teams' => $teams, 'matches' => $matches]);
}


    // public function announce()
    // {
    //     // Fetch matches data from the database
    //     $matches = Announcement::select(
    //         'announcements.*',
    //         'create_matches.team1_id',
    //         'team1.tname as team1_name',
    //         'team2.tname as team2_name',
    //         'teams.tname as winnerTeam',
    //         'create_matches.bonus_points_team1',
    //         'create_matches.bonus_points_team2',
    //         'create_matches.rounds'
    //     )
    //     ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
    //     ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
    //     ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
    //     ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
    //     ->get();
    
    //     // Iterate through the matches and apply the bonus logic
    //     foreach ($matches as $match) {
    //         $bonusPoints1 = 0.00;
    //         $bonusPoints2 = 0.00;
    //         $bonusTeam1 = null;
    //         $bonusTeam2 = null;
    
    //         // Determine the bonus points and team for both teams
    //         if ($match->bonus_points_team1 != 0.00) {
    //             $bonusPoints1 = $match->bonus_points_team1;
    //             $bonusTeam1 = $match->team1_name;
    //         }
    
    //         if ($match->bonus_points_team2 != 0.00) {
    //             $bonusPoints2 = $match->bonus_points_team2;
    //             $bonusTeam2 = $match->team2_name;
    //         }
    
    //         // Calculate the total with bonus for the winner and loser
    //         $match->winnerScore = $match->winner + max($bonusPoints1, $bonusPoints2);
    //         $match->looserScore = $match->looser;
    
    //         // Store bonus points and teams in match object
    //         $match->bonus_points_team1 = $bonusPoints1;
    //         $match->bonus_points_team2 = $bonusPoints2;
    //         $match->bonus_team1 = $bonusTeam1;
    //         $match->bonus_team2 = $bonusTeam2;
    //     }
        
    //     // Fetch other necessary data for the view
    //     $user = auth()->user();
    //     $setPools = $user->setPools;
    //     $join_pool = $user->joinPools;
    
    //     $scheduledMatches = CreateMatch::select(
    //         'create_matches.*',
    //         'team1.tname as team1_name',
    //         'team1.thumbnail as team1_image',
    //         'team2.tname as team2_name',
    //         'team2.thumbnail as team2_image'
    //     )
    //     ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
    //     ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
    //     ->get();
    
    //     // Group matches by round
    //     $matchesByRound = $scheduledMatches->groupBy('rounds');
    
    //     // Get a list of match IDs for which winning teams have been selected
    //     $announcedMatches = Announcement::pluck('winning_team_id')->toArray();
    
    //     // Return view with all necessary data
    //     return view('Admin.pages.Announcement', compact('setPools', 'user', 'scheduledMatches', 'join_pool', 'announcedMatches', 'matches', 'matchesByRound'));
    // }
    public function announce()
    {
        $matches = Announcement::select(
            'announcements.*',
            'create_matches.team1_id',
            'team1.tname as team1_name',
            'team2.tname as team2_name',
            'teams.tname as winnerTeam',
            'create_matches.bonus_points_team1',
            'create_matches.bonus_points_team2',
            'create_matches.rounds',
        )
        ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
        ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->get();
        
    
        // Iterate through the matches and apply the bonus logic
        foreach ($matches as $match) {
            $bonusPoints1 = 0.00;
            $bonusPoints2 = 0.00;
            $bonusTeam1 = null;
            $bonusTeam2 = null;
    
            // Determine the bonus points and team for both teams
            if ($match->bonus_points_team1 != 0.00) {
                $bonusPoints1 = $match->bonus_points_team1;
                $bonusTeam1 = $match->team1_name;
            }
    
            if ($match->bonus_points_team2 != 0.00) {
                $bonusPoints2 = $match->bonus_points_team2;
                $bonusTeam2 = $match->team2_name;
            }
    
            // Calculate the total with bonus for the winner and loser
            $match->winnerScore = $match->winner + max($bonusPoints1, $bonusPoints2);
            $match->looserScore = $match->looser;
    
            // Store bonus points and teams in match object
            $match->bonus_points_team1 = $bonusPoints1;
            $match->bonus_points_team2 = $bonusPoints2;
            $match->bonus_team1 = $bonusTeam1;
            $match->bonus_team2 = $bonusTeam2;
        }
        
        // Fetch other necessary data for the view
        $user = auth()->user();
        $setPools = $user->setPools;
        $join_pool = $user->joinPools;
    
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
    
        // Group matches by round
        $matchesByRound = $scheduledMatches->groupBy('rounds');
    
        // Get a list of match IDs for which winning teams have been selected
        $announcedMatches = Announcement::pluck('winning_team_id')->toArray();
    
        // Return view with all necessary data
        return view('Admin.pages.Announcement', compact('setPools', 'user', 'scheduledMatches', 'join_pool', 'announcedMatches', 'matches', 'matchesByRound'));
    }
    
    
    
    public function updateTeamScores(Request $request, $id)
    {
        $request->validate([
            'looserTeam' => 'required|string',
            'winner' => 'required|numeric',
            'looser' => 'required|numeric',
        ]);
    
        // Find the announcement based on the provided $id
        $announcement = Announcement::find($id);
    
        if (!$announcement) {
            return redirect()->back()->with('error', 'Announcement not found.');
        }
    
        // Update the announcement attributes
        $announcement->winnerTeam = $request->input('winnerTeam');
        $announcement->looserTeam = $request->input('looserTeam');
        $announcement->winner = $request->input('winner');
        $announcement->looser = $request->input('looser');
    
        // Save the changes
        $announcement->save();
    
        return redirect()->back()->with('success', 'Team scores updated successfully.');
    }
    public function editTeamScores($id)
    { 
        // $match = Announcement::findOrFail($id);
        $match = Announcement::select('announcements.*' ,'create_matches.team1_id' ,'team1.tname as team1_name','team2.tname as team2_name','teams.tname as winnerTeam')
        ->join('create_matches', 'create_matches.id', '=', 'announcements.match_id')
        ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->findOrFail($id);
        $matches2 = CreateMatch::select(
            'create_matches.*',
            'teams.tname as winner')
                ->join('announcements', 'announcements.match_id', '=', 'create_matches.id')
                ->join('teams', 'teams.id', '=', 'announcements.winning_team_id')
                ->get();
        return view('Admin.pages.updateTeamScores', compact('match','matches2'));
    }
  
    public function handleTeamSelection(Request $request)
{
    // Get the winner team ID and match ID from the request
    $winnerTeamId = $request->input('winner_team_id');
    $matchId = $request->input('match_id');

    // Retrieve the match to determine team1_id and team2_id
    $match = CreateMatch::find($matchId);

    if (!$match) {
        return redirect()->back()->with('error', 'Match not found.');
    }

    // Save the winner team to the Announcement table
    Announcement::updateOrCreate(
        ['match_id' => $matchId],
        ['winning_team_id' => $winnerTeamId]
    );

    // Store the winner team ID in the session
    session()->put('winner_team_id_'. $matchId, $winnerTeamId);

    // Return response with success and winner team ID
    // return response()->json(['success' => true, 'winner_team_id' => $winnerTeamId]);
    return redirect()->back()->with('success', 'Winner team selected and announcement saved.');

}
    public function announceWinner(Request $request)
    {
        $matchId = $request->input('match_id');
        $winnerTeamId = $request->input('winner_team_id');
        $round = $request->input('round'); // Get the round from the request
        

        $announcement = Announcement::where('match_id', $matchId)
                                   ->where('rounds', $round) // Check the round
                                   ->first();
                                   dd($announcement);
    
        if ($announcement) {
            $announcement->winning_team_id = $winnerTeamId;
            $announcement->status = 1;
            $announcement->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    // Helper function to check if a team has been announced as winner in any previous round
    private function hasBeenAnnounced($teamId)
    {
        // Query the Announcement table to check if the team has been announced
        return Announcement::where('winning_team_id', $teamId)->exists();
    }
    // public function announceWinner(Request $request) {
    //     $matchId = $request->input('match_id');
        
    //     // Update the status to 1 in the database
    //     $announcement = Announcement::where('match_id', $matchId)->first();
        
    //     if ($announcement) {
    //         $announcement->status = 1;
    //         $announcement->save();
    //         return response()->json(['success' => true]);
    //     } else {
    //         return response()->json(['success' => false]);
    //     }
    // }
    public function store(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'bonus_points_team1' => 'required|integer',
            'bonus_points_team2' => 'required|integer',
            'rounds' => 'required|integer'
        ]);
    
        // Check if the round already has 3 matches
        $matchesInRound = CreateMatch::where('rounds', $request->rounds)->count();
    
        if ($matchesInRound >= 3) {
            return redirect()->back()->withErrors(['rounds' => 'This round already has 3 matches scheduled.'])->withInput();
        }
        $team1 = $request->input('team1_id');
        $team2 = $request->input('team2_id');
        $round = $request->input('rounds');
    
        // Check if either team is already playing in the same round
        $existingMatches = CreateMatch::where('rounds', $round)
            ->where(function($query) use ($team1, $team2) {
                $query->where('team1_id', $team1)
                      ->orWhere('team2_id', $team1)
                      ->orWhere('team1_id', $team2)
                      ->orWhere('team2_id', $team2);
            })->exists();
    
        if ($existingMatches) {
            return redirect()->back()->withErrors(['message' => 'This team has already a match with another team in ROUND ' . $round])->withInput();
        }
    
        $formData = $request->only([
            'team1_id',
            'team2_id',
            'match_date',
            'bonus_points_team1',
            'bonus_points_team2',
            'rounds'
        ]);
    
        CreateMatch::create($formData);
    
        return redirect('/All-Schedule-Matches')->with('success', 'Match scheduled successfully!');
    }
    
    
    
    
    
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'team1_id' => 'required|exists:teams,id',
        'team2_id' => 'required|exists:teams,id',
        'match_date' => 'required|date',
    ]);

    $match = CreateMatch::findOrFail($id);

    $team1 = Team::find($validatedData['team1_id']);
    $team2 = Team::find($validatedData['team2_id']);

    // Deduct previous bonuses
    $team1->bonus -= $match->bonus_points_team1;
    $team2->bonus -= $match->bonus_points_team2;

    // Add new bonuses
    $team1->bonus += $request->input('bonus_points_team1', 0);
    $team2->bonus += $request->input('bonus_points_team2', 0);

    $team1->save();
    $team2->save();

    // Update the match record
    $match->update([
        'team1_id' => $validatedData['team1_id'],
        'team2_id' => $validatedData['team2_id'],
        'bonus_points_team1' => $request->input('bonus_points_team1', 0),
        'bonus_points_team2' => $request->input('bonus_points_team2', 0),
        'match_date' => $validatedData['match_date'],
    ]);

    return redirect('/All-Schedule-Matches')->with('success', 'Match updated successfully!');
}

public function scheduledMatches(){
    $scheduledMatches = CreateMatch::select('create_matches.*', 'team1.tname as team1_name', 'team2.tname as team2_name')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->distinct()
        ->get();

    return view('Admin.pages.CreateTeams.scheduledMatches', compact('scheduledMatches'));
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

    public function upCommingMatches(){
        $matches = CreateMatch::select(
                'create_matches.*',
                'match_date as date',
                'team1.tname as team1_name',
                'team2.tname as team2_name',
                'team1.thumbnail as team1_image',
                'team2.thumbnail as team2_image',
                'team1.venue as team1_venue', 
                'team2.venue as team2_venue'
            )
            ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
            ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
            ->orderBy('create_matches.rounds') // Ensure matches are ordered by rounds number
            ->get();
    
        // Group matches by rounds for easier iteration in the view
        $groupedMatches = $matches->groupBy('rounds');
    
        return view('user.matches', compact('groupedMatches'));
    }
    
    public function SetBonusPoints(Request $request){
        $scheduledMatches = CreateMatch::select('create_matches.*', 'team1.tname as team1_name', 'team1.thumbnail as team1_image', 'team2.tname as team2_name', 'team2.thumbnail as team2_image')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->get();
        $spreadPoints = Sets_Spread::get();

        return view('Admin.pages.setBonusPoints',compact('scheduledMatches','spreadPoints'));

    }
    public function storeBonusPoints(Request $request)
    {
        $request->validate([
            'teams' => 'required',
            'bonus_points' => 'required|numeric',
        ]);

        Sets_Spread::create([
            'teams' => $request->input('teams'),
            'bonus_points' => $request->input('bonus_points'),
        ]);

        return redirect('/Set-Spreads/Bonus-points')->with('success', 'Bonus points added successfully.');
    }
    public function editBonusPoints($id)
    {
        $setsSpread = Sets_Spread::findOrFail($id);
        $scheduledMatches = CreateMatch::select('create_matches.*', 'team1.tname as team1_name', 'team1.thumbnail as team1_image', 'team2.tname as team2_name', 'team2.thumbnail as team2_image')
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->get();

        return view('Admin.pages.edit_bonus_points', compact('setsSpread', 'scheduledMatches'));
    }
    public function updateBonusPoints(Request $request, $id)
    {
        $request->validate([
            'teams' => 'required',
            'bonus_points' => 'required|numeric',
        ]);

        $setsSpread = Sets_Spread::findOrFail($id);
        $setsSpread->update([
            'teams' => $request->input('teams'),
            'bonus_points' => $request->input('bonus_points'),
        ]);

        return redirect('/Set-Spreads/Bonus-points')->with('success', 'Bonus points updated successfully.');
    }
}


