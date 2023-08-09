<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expression;
use App\Models\User;
use App\Http\Requests\ExpressionRequest;
use Illuminate\Support\Facades\Auth;

class ExpressionController extends Controller
{
    public function home_expression(Expression $expression)
    {
        return view('expressions.home_expression')->with(['expressions' => $expression->getPaginateBylimit()]);
    }
    
    public function index(Expression $expression) 
    {
        $expression = Auth::user()->expressions()->orderBy('updated_at', 'DESC')->paginate(2);
        return view('expressions.index')->with(['expressions' => $expression]);
    }
    
    public function show(Expression $expression)
    {
        return view('expressions.show')->with(['expression' => $expression]);
    }
    
    public function create(Expression $expression)
    {
        return view('expressions.create')->with(['expression' => $expression]);
    }
    
    public function add(ExpressionRequest $request, Expression $expression)
    {
        $input = $request['expression'];
        $expression->user_id = \Auth::id();
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
        return redirect('/expressions/' . $expression->id);
    }
    
    public function delete(Expression $expression)
    {
        $expression->delete();
        return redirect('/');
    }
    
}
