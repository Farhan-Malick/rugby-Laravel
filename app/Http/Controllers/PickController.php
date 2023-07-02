<?php

namespace App\Http\Controllers;

use App\Models\Pick;
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

        // Retrieve the picked teams from the request
        $pickedTeams = $request->input('teams');

        // Perform pick validation
        if (!is_array($pickedTeams) || count($pickedTeams) !== 3 || count(array_column($pickedTeams, 'id')) !== count(array_unique(array_column($pickedTeams, 'id')))) {
            return redirect()->back()->with('error', 'Invalid picks');
        }

        // Sort the picked teams based on their priority in ascending order
        usort($pickedTeams, function($a, $b) {
            return $a['priority'] - $b['priority'];
        });

        // Assign points based on priority
        $points = [6, 4, 2];

        // Store picks in the database
        try {
            foreach ($pickedTeams as $index => $team) {
                $pick = new Pick();
                $pick->user_id = $user->id;
                $pick->teamname = $team['name'];

                // Get the corresponding points using the team's priority
                $pick->points = $points[count($pickedTeams) - $team['priority'] ];

                $pick->save();
            }

            return redirect()->back()->with('success', 'Picks submitted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function myPicksTable()
    {
        $Picks = Pick::select('picks.*', 'users.first_name as name')
        ->join('users', 'picks.user_id', '=', 'users.id')
        ->get();
        return view('user.myPicks',compact('Picks'));
    }



}
