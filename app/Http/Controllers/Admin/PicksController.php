<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScoreChart;
use Illuminate\Http\Request;

class PicksController extends Controller
{
    public function ScoreChartForm()
    {
        return view('Admin.allpicks.score_chart');
    }

    public function store(Request $request)
    {
        $score_chart = new ScoreChart();
        $score_chart->round1 = $request['round1'];
        $score_chart->round2 = $request['round2'];
        $score_chart->total = $request['round1'] + $request['round2'];

        $score_chart->save();

        return redirect()->back();


    }
}
