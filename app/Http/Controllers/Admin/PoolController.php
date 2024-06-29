<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pool;
use App\Models\Admin\Team;
use App\Models\Pick;
use App\Models\SetPool;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateMatch;
use App\Models\JoinPool;
use App\Models\PaymentMethod;
use App\Models\Announcement;


use Illuminate\Support\Facades\DB;


class PoolController extends Controller
{
    
    public function userPicks()
{
    $users = User::with('picks')->has('picks')->get();

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

    foreach ($matches as $match) {
        $bonusPoints = 0.00;
        $bonusTeam = null;

        if ($match->bonus_points_team1 != 0.00) {
            $bonusPoints = $match->bonus_points_team1;
            $bonusTeam = $match->team1_name;
        } elseif ($match->bonus_points_team2 != 0.00) {
            $bonusPoints = $match->bonus_points_team2;
            $bonusTeam = $match->team2_name;
        }

        $match->bonus_points = $bonusPoints;
        $match->bonus_team = $bonusTeam;
    }

    return view('Admin.allpicks.all_user_picks', compact('users', 'matches'));
}

    public function paymentMethod(){
        // echo "fcuk";
        return view('user.payment.paymentMethod');
    }
    public function paymentMethodViaCard(Request $request) {
        $request->validate([
            'cardNumber' => 'required',
            'mmYY' => 'required',
            'cvv' => 'required',
            'cardName' => 'required',
        ]);

        PaymentMethod::create($request->all());

        return redirect('create-pool')->with('success', 'Payment method added successfully!');
    }
    public function PoolListings (){
        $PoolListings = Pool::get();
        return View('Admin.pages.CreatePool.allPools',compact('PoolListings'));
    }
    public function destroyPool($id)
{
     // Find the pool
     $pool = Pool::findOrFail($id);

     // Delete related rows in set_pools table
     \DB::table('set_pools')->where('pool_id', $id)->delete();
 
    $pool->delete();

    return redirect()->back()->with('success', 'Pool deleted successfully');
}

    public function PoolForm (){
        return view('Admin.pages.CreatePool.createPoolForClient');
    }
    public function CreatePools(Request $request){

        $poolListing= new Pool();
        $poolListing->poolname=$request->poolname;
        $poolListing->pool_category=$request->pool_category;
        $poolListing->status=$request->status;
        if($request->hasfile('poolimage'))
        {
            $poolimage=$request->file('poolimage');
            $ext = $poolimage->GetClientOriginalExtension();
            $file2=time().'.'.$ext;

            $poolimage->move(public_path('uploads/PoolFromAdmin'), $file2);
            $poolListing['poolimage']=$file2;
        }
        // dd($poolListing);
        $poolListing->save();
        $request->session()->flash('msg','Listing Has Been Added Successfully');
        return redirect('Admin/Pool-Form');
    }
    // Client Section
    public function profile()
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

        $matchesByRound = $scheduledMatches->groupBy('rounds');

        return view('user.profile', compact('setPools', 'user', 'matchesByRound','join_pool'));
    }

    public function Client_Pool_Show (){
        $Pools = Pool::get();
        return view('user.createPool',compact('Pools'));
    }
    public function Set_Pool_Show ($pool_id){
        return view('user.setPool',compact('pool_id'));
    }
    public function submit_set_Pool(Request $request, $pool_id){
        $setPool = new SetPool();
        $setPool->user_id = auth()->id();
        $setPool->pool_id = $pool_id;
        $setPool->pool_name = $request->input('pool_name');
        $setPool->pool_format = $request->input('pool_format');
        $setPool->pool_spread = $request->input('pool_spread');
        $setPool->pool_week = $request->input('pool_week');
        
        // Generate a random ID
        $setPool->random_id = uniqid();
    
        $setPool->save();
    
        return redirect()->route('profile')->with('success', 'Pool has been set');
    }
   
    
    // Join POOL section
    public function allPools()
    {
        $setPools = SetPool::all();

        return view('user.allPools',compact('setPools'));


    }

    public function form($id)
    {
       
        $random_id = SetPool::find($id);
        if (is_null($id)) {
            //not found
            return redirect()->back();
        } else {
            //found
            return view('user.joinPoolForn',compact('random_id'));
        }
    }

public function saveJoinPool(Request $request)
{
    $created_pool_id = $request->input('created_pool_id');
    $pool = DB::table('set_pools')->where('random_id', $created_pool_id)->first();

    if ($pool) {
        $join_pool = new JoinPool();
        $join_pool->user_id = auth()->id();
        $join_pool->user_name = "DEMO"; // Replace this with actual user data
        $join_pool->pool_id = $pool->id;
        $join_pool->created_pool_id = $created_pool_id;
        $join_pool->pool_name = $request->input('pool_name');
        $join_pool->save();

        return response()->json(['success' => true, 'redirect_url' => route('view-pool-data', ['pool_id' => $pool->id, 'created_pool_id' => $created_pool_id])]);
    } else {
        return response()->json(['success' => false, 'error' => 'Pool ID does not exist']);
    }
}


   
    
    public function poolData($first_name, $last_name, $pool_id)
    {
        $userId = auth()->id();
    
        // Select picks for the authenticated user
        $Picks = Pick::select('picks.*', 'users.first_name as name')
            ->join('users', 'picks.user_id', '=', 'users.id')
            ->where('picks.user_id', $userId)
            ->orderBy('picks.rnd', 'asc')
            ->get();
    
        // Select picks for users who joined the same pool through invitation
        $InvitedPicks = Pick::select('picks.*', 'users.first_name as name')
            ->join('users', 'picks.user_id', '=', 'users.id')
            ->join('join_pools', 'picks.user_id', '=', 'join_pools.user_id')
            ->where('join_pools.pool_id', $pool_id)
            ->orderBy('picks.rnd', 'asc')
            ->get();
    
        // Merge both collections to combine picks
        $AllPicks = $Picks->merge($InvitedPicks);
    
        return view('poolData', compact('AllPicks'));
    }

    
    public function viewPoolData($pool_id, $created_pool_id)
    {
        $user = auth()->user();
        $setPools = $user->setPools;
        $join_pool = $user->joinPools;
    
        // Fetch scheduled matches and organize by rounds
        $scheduledMatches = CreateMatch::select(
            'create_matches.*',
            'team1.tname as team1_name',
            'team1.thumbnail as team1_image',
            'team2.tname as team2_name',
            'team2.thumbnail as team2_image'
        )
        ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
        ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
        ->distinct()
        ->get();
    
        $matchesByRoundPicks = $scheduledMatches->groupBy('rounds');
    
        // Fetch users who have picks
        $users = User::has('picks')->with(['picks' => function ($query) use ($created_pool_id) {
            $query->where('created_pool_id', $created_pool_id);
        }])->get();
    
        // Fetch announcements and calculate loser teams
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
    
        foreach ($matches as $match) {
            $match->loserTeam = ($match->winnerTeam == $match->team1_name) ? $match->team2_name : $match->team1_name;
        }
    
        $matchesByRound = $matches->groupBy('rounds');
    
        // Determine rounds available for display
        $rounds = $matches->pluck('rounds')->unique();
    
        // Fetch user picks for the current pool and total picks
        $userPicks = Pick::select('picks.*', 'users.first_name as name')
                        ->join('users', 'picks.user_id', '=', 'users.id')
                        ->where('picks.user_id', $user->id)
                        ->where('picks.created_pool_id', $created_pool_id)
                        ->orderBy('picks.rnd', 'asc')
                        ->get();
    
        $invitedPicks = Pick::select('picks.*', 'users.first_name as name')
                        ->join('users', 'picks.user_id', '=', 'users.id')
                        ->join('join_pools', 'picks.user_id', '=', 'join_pools.user_id')
                        ->where('join_pools.pool_id', $pool_id)
                        ->where('picks.created_pool_id', $created_pool_id)
                        ->orderBy('picks.rnd', 'asc')
                        ->get();
    
        $AllPicks = $userPicks->merge($invitedPicks);
    
        $joinedUsers = User::select('users.*', 'join_pools.pool_id', 'join_pools.pool_name')
                        ->join('join_pools', 'users.id', '=', 'join_pools.user_id')
                        ->where('join_pools.pool_id', $pool_id)
                        ->get();
    
        $poolDetails = SetPool::select('id', 'pool_name')
                        ->where('id', $pool_id)
                        ->first();
    
        return view('user.completeDetail', compact('AllPicks', 'pool_id', 'created_pool_id', 'users', 'matchesByRound', 'setPools', 'user', 'matchesByRoundPicks', 'join_pool', 'joinedUsers', 'poolDetails', 'rounds'));
    }
    
    
    
    
    


}
