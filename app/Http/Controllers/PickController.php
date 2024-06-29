<?php

namespace App\Http\Controllers;

use App\Models\Pick;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;


class PickController extends Controller
{
  
    public function submitPicks(Request $request)
    {
        $user = auth()->user();
        $createdPoolId = $request->input('created_pool_id');
        $teams = $request->input('teams');
        $points = $request->input('points');
    
        // Validate the request
        if (!$createdPoolId) {
            return response()->json(['error' => 'Missing created_pool_id for a team.'], 400);
        }
    
        if (!$teams || !is_array($teams) || count($teams) == 0) {
            return response()->json(['error' => 'No teams selected.'], 400);
        }
    
        // Unique team per round validation
        $teamRounds = [];
        foreach ($teams as $team) {
            $round = $team['rounds'];
            $teamName = $team['name'];
    
            if (!isset($teamRounds[$round])) {
                $teamRounds[$round] = [];
            }
    
            if (in_array($teamName, $teamRounds[$round])) {
                return response()->json(['error' => 'You have already picked team ' . $teamName . ' in round ' . $round . '.'], 400);
            }
    
            $teamRounds[$round][] = $teamName;
        }
    
        // Loop through the selected teams and save each pick
        foreach ($teams as $index => $team) {
            $rnd = $team['rounds'];
            $teamName = $team['name'];
    
            // Check if the same team is already picked in the same round
            $existingPick = Pick::where('user_id', $user->id)
                ->where('created_pool_id', $createdPoolId)
                ->where('rnd', $rnd)
                ->where('teamname', $teamName)
                ->first();
    
            if ($existingPick) {
                return response()->json(['error' => 'You have already picked team ' . $teamName . ' in round ' . $rnd . '.'], 400);
            }
    
            // Check if more than 3 teams are picked in the same round
            $existingPicksCount = Pick::where('user_id', $user->id)
                ->where('created_pool_id', $createdPoolId)
                ->where('rnd', $rnd)
                ->count();
    
            if ($existingPicksCount >= 3) {
                return response()->json(['error' => 'You can only select three teams in round ' . $rnd . '.'], 400);
            }
    
            $pick = new Pick();
            $pick->user_id = $user->id;
            $pick->teamname = $teamName;
            $pick->points = $points[$index];
            $pick->rnd = $rnd;
            $pick->created_pool_id = $createdPoolId;
            $pick->save();
        }
    
        return response()->json(['success' => 'Picks submitted successfully.']);
    }
    
    public function myPicksTable()
    {
        $userId = auth()->id();
    
        $Picks = Pick::select('picks.*', 'users.first_name as name')
            ->join('users', 'picks.user_id', '=', 'users.id')
            ->where('picks.user_id', $userId)
            ->orderBy('rnd', 'asc') // Sort by rnd (round number) in descending order
           // Then by id in descending order within the same round
            ->get();
    
        return view('user.myPicks', compact('Picks'));
    }
    
    

}
