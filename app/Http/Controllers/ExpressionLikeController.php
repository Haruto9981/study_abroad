<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expression;
use App\Models\User;
use App\Http\Requests\DiaryRequest;

class ExpressionLikeController extends Controller
{
    public function store(Expression $expression)
    {
        $expression->users()->attach(Auth::user()->id);
        return redirect()->back();
    }

    
    public function destroy(Expression $expression)
    {
        $expression->users()->detach(Auth::user()->id);
        return redirect()->back();
    }
}
