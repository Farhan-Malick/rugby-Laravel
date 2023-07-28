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
use Illuminate\Support\Facades\DB;


class PoolController extends Controller
{
    public function PoolListings (){
        $PoolListings = Pool::get();
        return View('Admin.pages.CreatePool.allPools',compact('PoolListings'));
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

        $scheduledMatches = CreateMatch::select('create_matches.*', 'team1.tname as team1_name', 'team2.tname as team2_name')
            ->join('teams as team1', 'team1.id', '=', 'create_matches.team1_id')
            ->join('teams as team2', 'team2.id', '=', 'create_matches.team2_id')
            ->get();

        return view('user.profile', compact('setPools', 'user', 'scheduledMatches','join_pool'));
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
    




    public function userPicks()
    {
        $users = User::has('picks')->get();

        return view('Admin.allpicks.all_user_picks', compact('users'));
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
    
        // Check if the created_pool_id exists in the set_pools table
        $existsInSetPools = DB::table('set_pools')->where('random_id', $created_pool_id)->exists();
    
        if (!$existsInSetPools) {
            // Return a JSON response with an error message if the created_pool_id doesn't exist
            return response()->json(['error' => 'Pool ID does not exist']);
        }

        $user = User::all();

            // Save the form if the created_pool_id exists
            $join_pool = new JoinPool();
            $join_pool->user_id = auth()->id();
            $join_pool->user_name = $user->first()->first_name; // Corrected line

            $join_pool->created_pool_id = $created_pool_id;
            $join_pool->pool_name = $request->input('pool_name');
            $join_pool->save();

       
    
        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
    
    
    


}
