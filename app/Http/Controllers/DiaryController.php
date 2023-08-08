<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\User;
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function home(Diary $diary, User $user)
    {
        $user = Auth::user();
        return view('diaries.home')->with(['diaries' => $diary->getPaginateByLimit(), 'user' => $user]);
    }
    
    public function index(Diary $diary, User $user) 
    {
        $user = Auth::user();
        return view('diaries.index')->with(['diaries' => $diary->getPaginateByLimit(), 'user' => $user]);
    }
    
    public function show(Diary $diary)
    {
        return view('diaries.show')->with(['diary' => $diary]);
    }
    
    public function create(Diary $diary)
    {
        return view('diaries.create')->with(['diary' => $diary]);
    }
    
    public function add(DiaryRequest $request, Diary $diary)
    {
        $dir = 'sample';
        $file_name = $request->file('diary.photo')->getClientOriginalName();
        $request->file('diary.photo')->storeAs('public/' . $dir, $file_name);
        
        $input = $request['diary'];
        $diary->user_id = \Auth::id();
        $diary->fill($input)->save();
        return redirect('/diaries/index');
    }
    
    public function edit(Diary $diary)
    {
        return view('diaries.edit')->with(['diary' => $diary]);
    }
    
    public function update(DiaryRequest $request, Diary $diary)
    {
        $input = $request['diary'];
        $diary->fill($input)->save();
        return redirect('/diaries/' . $diary->id);
    }
    
    public function delete(Diary $diary)
    {
        $diary->delete();
        return redirect('/');
    }
    
}
