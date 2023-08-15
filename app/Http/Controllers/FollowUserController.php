<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class FollowUserController extends Controller
{
    public function index(User $user) 
    {
        $user = Auth::user()->get();
        return view('/follows/index')->with(['users' => $user]);
    }
    
     
    public function store(User $user)
    {
        $user->followings()->attach(Auth::id());
        return redirect()->back();
    }
    
    public function destroy(User $user)
    {
        $user->followings()->detach(Auth::id());
        return redirect()->back();
    }
}
