<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\Expression;
use App\Models\User;
use App\Models\DiaryComment;
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;

class DiaryController extends Controller
{
    public function home_diary(Diary $diary, User $user)
    {
        $user = Auth::user();
        $datetime = new DateTime($user->profile->end_date);
        $current  = new DateTime('now');
        $diff     = $current->diff($datetime);
        return view('diaries.home_diary')->with(['diaries' => $diary->getPaginateByLimit(), 'user' => $user, 'diff' => $diff]);
    }
    
    public function index(Diary $diary) 
    {
        $diary = Auth::user()->diaries()->orderBy('updated_at', 'DESC')->paginate(2);
        return view('diaries.index')->with(['diaries' => $diary]);
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
        $input = $request['diary'];
        $diary->user_id = \Auth::id();
        if(isset($input['photo'])) {
           $diaryPhotoPath = $input['photo']->store('public/sample');
           $diary['photo'] = $diaryPhotoPath;
        }
       
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
