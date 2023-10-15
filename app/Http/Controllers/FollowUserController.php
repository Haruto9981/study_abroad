<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class FollowUserController extends Controller
{
    public function index_following()
    {
        $followings = Auth::user()->followings()->get();
        $followers = Auth::user()->followers()->get();
        return view('/follows/index_following')->with(['followings' => $followings, 'followers' => $followers]);
    }
    
    
    public function index_follower() 
    {
        $followings = Auth::user()->followings()->get();
        $followers = Auth::user()->followers()->get();
        return view('/follows/index_follower')->with(['followings' => $followings, 'followers' => $followers]);
    }
    
     
    public function store(User $user)
    {
        $user->followers()->attach(Auth::id());
        return redirect()->back();
    }
    
    
    public function destroy(User $user)
    {
        $user->followers()->detach(Auth::id());
        return redirect()->back();
    }
}
