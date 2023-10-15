<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\User;
use App\Http\Requests\DiaryRequest;

class DiaryLikeController extends Controller
{
    public function store(Diary $diary)
    {
        $diary->users()->attach(Auth::user()->id);
        return redirect()->back();
    }

 
    public function destroy(Diary $diary)
    {
        $diary->users()->detach(Auth::user()->id);
        return redirect()->back();
    }
}
