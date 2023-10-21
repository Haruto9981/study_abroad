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
use Cloudinary;

class DiaryController extends Controller
{
    public function home_diary(Diary $diary)
    {
        $user = Auth::user();
        $end_date = new DateTime($user->profile->end_date);
        $start_date = new DateTime($user->profile->start_date);
        $current  = new DateTime();
        $diff1 = $current->diff($end_date);
        $diff2 = $current->diff($start_date);
        
        return view('diaries.home_diary')->with(['diaries' => $diary->getPublicDiary(), 'user' => $user, 'diff1' => $diff1, 'diff2' => $diff2]);
    }
    
    public function index(Diary $diary) 
    {
        return view('diaries.index')->with(['diaries' => $diary->getAuthUserDiary()]);
    }
    
    
    public function show(Diary $diary)
    {
        $user = Auth::user();
        return view('diaries.show')->with(['diary' => $diary, 'user' => $user ]);
    }
    
    
    public function homeShow(Diary $diary)
    {
        $user = Auth::user();
        return view('diaries.home_show')->with(['diary' => $diary, 'user' => $user ]);
    }
    
    
    public function create(Diary $diary)
    {
        return view('diaries.create')->with(['diary' => $diary]);
    }
    
    
    public function add(DiaryRequest $request, Diary $diary)
    {
        $input = $request['diary'];
        $diary->user_id = Auth::user()->id;
        $diary->word_count = str_word_count($input['content']);
        
        if($request->file('photo')) {
            
            $photo_url = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
            $input += ['photo_url' => $photo_url]; 
             
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
        $diary->word_count = str_word_count($input['content']);
         
        if($request->file('photo')) {
            
             $photo_url = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
             $input += ['photo_url' => $photo_url]; 
        }
        
        $diary->fill($input)->save();
        return redirect('/diaries/index/' . $diary->id);
    }
    
    
    public function delete(Diary $diary)
    {
        $diary->delete();
        return redirect('/diaries/index');
    }
    
}
