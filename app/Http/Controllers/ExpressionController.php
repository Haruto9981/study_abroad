<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expression;
use App\Models\User;
use App\Http\Requests\ExpressionRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ExpressionController extends Controller
{
    public function home_expression(Expression $expression)
    {
        $user = Auth::user();
        $end_date = new DateTime($user->profile->end_date);
        $start_date = new DateTime($user->profile->start_date);
        $current  = new DateTime();
        $diff1 = $current->diff($end_date);
        $diff2 = $current->diff($start_date);
        return view('expressions.home_expression')->with(['expressions' => $expression->getPublicExpression(), 'user' => $user, 'diff1' => $diff1, 'diff2' => $diff2]);
    }
    
    
    public function index(Expression $expression) 
    {
        return view('expressions.index')->with(['expressions' => $expression->getAuthUserExpression()]);
    }
    
    
    public function create(Expression $expression)
    {
        return view('expressions.create')->with(['expression' => $expression]);
    }
    
    
    public function add(ExpressionRequest $request, Expression $expression)
    {
        $input = $request['expression'];
        $expression->user_id = Auth::user()->id;
        $expression->fill($input)->save();
        return redirect('/expressions/index');
    }
    
    
    public function edit(Expression $expression)
    {
        return view('expressions.edit')->with(['expression' => $expression]);
    }
    
    
    public function update(ExpressionRequest $request, Expression $expression)
    {
        $input = $request['expression'];
        $expression->fill($input)->save();
        return redirect('/expressions/index');
    }
    
    
    public function delete(Expression $expression)
    {
        $expression->delete();
        return redirect('/expressions/index');
    }
    
}
