<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    public function index(Diary $diary) 
    {
        return view('diaries.index')->with(['diaries' => $diary->getPaginateByLimit()]);
    }
}
