<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiaryCommentRequest;
use App\Models\User;
use App\Models\DiaryComment;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(DiaryCommentRequest $request, DiaryComment $comment)
    {
        
        $input_comment = $request['comment'];
        $comment->fill($input_comment)->save();
        return redirect()->back();
     
    }
}
