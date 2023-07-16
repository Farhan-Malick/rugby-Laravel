<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pick;
use App\Models\ScoreChart;
use App\Models\User;
use Illuminate\Http\Request;

class PicksController extends Controller
{
    public function ScoreChartForm($id)
    {
        $user = User::findOrFail($id);
        $picks = $user->picks;

        return view('Admin.allpicks.score_chart', compact('user', 'picks'));
    }

    public function updateScoreChart(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'User not found');
            }

            // Retrieve the input values from the request
            $round1 = $request->input('round1');
            $round2 = $request->input('round2');
            $total = $round1 + $round2;

            // Update the user's picks data
            $user->picks()->update([
                'round1' => $round1,
                'round2' => $round2,
                'total' => $total,
            ]);

            return redirect()->route('users_picks')->with('success', 'Score chart updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
