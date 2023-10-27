<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expression;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\ExpressionRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ExpressionController extends Controller
{
    public function home_expression(Request $request, Expression $expression, Profile $profile)
    {
        $user = Auth::user();
        $end_date = new DateTime($user->profile->end_date);
        $start_date = new DateTime($user->profile->start_date);
        $current  = new DateTime();
        $diff1 = $current->diff($end_date);
        $diff2 = $current->diff($start_date);
        
         /* キーワードから検索処理 */
        $country = $request->input('country');
        $region = $request->input('region');
        
        $expressions = $expression->where('is_private', 'public')->orderBy('updated_at', 'DESC')->Paginate(5);
        
        if($country) {
            $profiles = $profile->where('country', $country)->get();
            if(count($profiles) != 0) {
                foreach($profiles as $profile) {
                $users = $profile->user()->get();
                    foreach($users as $user) {
                        $expressions = $user->expressions()->where('is_private', 'public')->orderBy('updated_at', 'DESC')->Paginate(5);
                    }
                }
            } else {
                $expressions = [];
            }
        }
        
        if($region) {
            foreach($expressions as $expression) {
                $query = $expression->user()->profile()->where('region', 'LIKE', "%{$region}%"); 
            }
        }
        
        return view('expressions.home_expression')->with(['expressions' => $expressions, 'user' => $user, 'diff1' => $diff1, 'diff2' => $diff2, 'country' => $country, 'region' => $region]);
    }
    
    
    public function index(Request $request, Expression $expression) 
    {
        /* キーワードから検索処理 */
        $keywords = $request->input('keywords');
        $is_private = $request->input('is_private');
        $year_month = $request->input('year_month');
        
        $query = Expression::query();
        
        if($is_private) {
            if($is_private == 'public') {
                $query->where('is_private', '=', 'public');
            } elseif ($is_private == 'private') {
                $query->where('is_private', '=', 'private');
            }
        }
        
        if($year_month) {
            $year = date('Y', strtotime($year_month));
            $month = date('m', strtotime($year_month));
            $query->whereYear("updated_at", $year)->WhereMonth('updated_at', $month);
        }
        
        if($keywords) {
            $query->where('vocabulary', 'LIKE', "%{$keywords}%")->orWhere('meaning', 'LIKE', "%{$keywords}%")->orWhere('example', 'LIKE', "%{$keywords}%");
        }
        
        
        $expressions = $query->where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->Paginate(5);
        
        
        if($year_month == null) {
            if(count($expressions) != 0) {
                $latest_expression = $expressions->first();
                $year_month = $latest_expression->updated_at->format('Y-m');
            }
        }
     
        if($keywords) {
            foreach($expressions as $expression) {
                $keywords = explode(",", $request->keywords);
                $expression->vocabulary = $this->search_text_highlight($keywords, $expression->vocabulary);
                $expression->meaning = $this->search_text_highlight($keywords, $expression->meaning);
                $expression->example = $this->search_text_highlight($keywords, $expression->example);
                $keywords = implode(",", $keywords);
            }
        }
        return view('expressions.index')->with(['expressions' => $expressions, 'keywords' => $keywords, 'is_private' => $is_private, 'year_month' => $year_month]);
    }
    
    public function search_text_highlight($keywords, $target_string)
    {
        // 検索対象文字列が空であれば、文字列をそのまま返す
        if(empty($keywords)){
            return $target_string;
        }

        foreach($keywords as $keyword){
            // 検索文字列がヒットしたらハイライトして返す
            if( ($pos = mb_strpos($target_string, $keyword, 0, 'UTF-8')) !== false ){
                // 対象文字列から、検索文字列を取得する
                $str = mb_substr($target_string, $pos, mb_strlen($keyword, 'UTF-8'), 'UTF-8');
                // 対象文字列から検索文字列をハイライトする
                $target_string = str_replace($str, "<span style='background-color:yellow'>{$str}</span>", $target_string);
            }
        }
        return $target_string;
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
