<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\Expression;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\User;

class MyRecordController extends Controller
{
    
    public function show(Diary $diary, Expression $expression)
    {
        return view('records.record')->with(['my_diaries' => $diary->getAuthUserDiary(), 'my_expressions' => $expression->getAuthUserExpression()]);
    }
    
}

    