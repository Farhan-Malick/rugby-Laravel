<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JoinPool;
use Illuminate\Http\Request;

class JoinedPoolsController extends Controller
{
    public function index()
    {
        $joined_pools = JoinPool::all();
        return view('Admin.pages.JoinedPools.joined_pools',compact('joined_pools'));
    }
}
