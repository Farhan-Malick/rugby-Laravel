<?php

namespace App\Http\Controllers;

use App\Models\Pick;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;


class PickController extends Controller
{

    // public function submitPicks(Request $request)
    // {
    //     $user = auth()->user();

    //     // Retrieve the picked teams from the request
    //     $pickedTeams = $request->input('teams');

    //     // Perform pick validation
    //     if (!is_array($pickedTeams) || count($pickedTeams) !== 3 || count(array_column($pickedTeams, 'id')) !== count(array_unique(array_column($pickedTeams, 'id')))) {
    //         return redirect()->back()->with('error', 'Invalid picks');
    //     }

    //     // Sort the picked teams based on their priority in ascending order
    //     usort($pickedTeams, function($a, $b) {
    //         return $a['priority'] - $b['priority'];
    //     });

    //     // Assign points based on priority
    //     $points = [6, 4, 2];

    //     // Store picks in the database
    //     try {
    //         foreach ($pickedTeams as $index => $team) {
    //             $pick = new Pick();
    //             $pick->user_id = $user->id;
    //             $pick->teamname = $team['name'];

    //             // Get the corresponding points using the team's priority
    //             $pick->points = $points[count($pickedTeams) - $team['priority']];

    //             $pick->save();
    //         }

    //         return redirect()->back()->with('success', 'Picks submitted successfully');
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    
    public function submitPicks(Request $request)
    {
        $user = auth()->user();
    
        // Check if the user already has three picks
        if ($user->picks()->count() == 3) {
            return redirect()->back()->with('error', 'You have already selected three teams.');
        }
    
        // Retrieve the picked teams from the request
        $pickedTeams = $request->input('teams');
    
        // Check if the user is trying to submit more picks than allowed
        $totalPicks = count($pickedTeams) + $user->picks()->count();
        if ($totalPicks > 3) {
            return redirect()->back()->with('error', 'You can only select three teams in total.');
        }
    
        // Check for duplicate teams
        $teamNames = array_column($pickedTeams, 'name');
        $uniqueTeamNames = array_unique($teamNames);
        if (count($teamNames) !== count($uniqueTeamNames)) {
            return redirect()->back()->with('error', 'Duplicate teams are not allowed.');
        }
    
        // Check for existing picks with the same team name
        $existingPicks = $user->picks()->whereIn('teamname', $teamNames)->get();
        if (!$existingPicks->isEmpty()) {
            return redirect()->back()->with('error', 'You cannot pick the same team again.');
        }
    
        // Sort the picked teams based on their priority in ascending order
        usort($pickedTeams, function ($a, $b) {
            return $a['priority'] - $b['priority'];
        });
    
        // Assign points based on priority
        $points = [2,4,6];
    
        // Store picks in the database
        try {
            foreach ($pickedTeams as $index => $team) {
                $pick = new Pick();
                $pick->user_id = $user->id;
                $pick->teamname = $team['name'];
    
                // Get the corresponding points using the team's priority
                $pick->points = $points[count($pickedTeams) - $team['priority']];
    
                $pick->save();
            }
    
            return redirect()->back()->with('success', 'Picks submitted successfully')->with('user', $user);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting picks.');
        }
    }
    



    public function myPicksTable()
    {
        $userId = auth()->id();
    
        $Picks = Pick::select('picks.*', 'users.first_name as name')
            ->join('users', 'picks.user_id', '=', 'users.id')
            ->where('picks.user_id', $userId)
            ->orderBy('points', 'desc') // Sort the picks in descending order of points
            ->get();
    
        return view('user.myPicks', compact('Picks'));
    }
    




}
