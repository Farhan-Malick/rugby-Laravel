<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pool;
use App\Models\SetPool;
use Illuminate\Support\Facades\Auth;


class PoolController extends Controller
{
    public function PoolListings (){
        $PoolListings = Pool::get();
        return view('Admin.pages.CreatePool.allPools',compact('PoolListings'));
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
    public function profile (){
        return view('user.profile');
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
        $setPool->save();

        return back()->with('success','Pool has been set');
    }

}
