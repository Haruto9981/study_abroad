<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\Expression;
use App\Models\User;
use App\Models\Profile;
use App\Models\DiaryComment;
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Cloudinary;
use Carbon\Carbon;

class DiaryController extends Controller
{
    public function home_diary(Request $request, Diary $diary, Profile $profile)
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
        
        $public_diaries = $diary->where('is_private', 'public')->orderBy('updated_at', 'DESC')->Paginate(5);
        
        if($country) {
            $profiles = $profile->where('country', $country)->get();
            if(count($profiles) != 0) {
                foreach($profiles as $profile) {
                $users = $profile->user()->get();
                    foreach($users as $user) {
                        $public_diaries = $user->diaries()->where('is_private', 'public')->orderBy('updated_at', 'DESC')->Paginate(5);
                    }
                }
            } else {
                $public_diaries = [];
            }
        }
        
        if($region) {
            
            if($country) {
                $profiles = $profile->where('country', $country)->where('region', 'LIKE', "%{$region}%")->get();
            } else {
                $profiles = $profile->where('region', 'LIKE', "%{$region}%")->get();
            }
            
            if(count($profiles) != 0) {
                foreach($profiles as $profile) {
                $users = $profile->user()->get();
                    foreach($users as $user) {
                        $public_diaries = $user->diaries()->where('is_private', 'public')->orderBy('updated_at', 'DESC')->Paginate(5);
                    }
                }
            } else {
                $public_diaries = [];
            }
        }
        
        return view('diaries.home_diary')->with(['public_diaries' => $public_diaries, 'my_diaries' => $diary->getAuthUserDiary(), 'user' => $user, 'diff1' => $diff1, 'diff2' => $diff2, 'country' => $country, 'region' => $region]);
    }
    
    public function index(Request $request, Diary $diary) 
    {
        /* キーワードから検索処理 */
        $keywords = $request->input('keywords');
        $is_private = $request->input('is_private');
        $year_month = $request->input('year_month');
        
        
        $query = Diary::query();
        
        if($keywords) {
            $query->where('title', 'LIKE', "%{$keywords}%")->orWhere('content', 'LIKE', "%{$keywords}%");
        }
        
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
        
        $diaries = $query->where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->Paginate(5);
        
        
        if($year_month == null) {
            if(count($diaries) != 0) {
                $latest_diary = $diaries->first();
                $year_month = $latest_diary->updated_at->format('Y-m');
            }
        }
        
        
        if($keywords) {
            foreach($diaries as $diary) {
                $keywords = explode(",", $request->keywords);
                $diary->title = $this->search_text_highlight($keywords, $diary->title);
                $diary->content = $this->search_text_highlight($keywords, $diary->content);
                $keywords = implode(",", $keywords);
            }
        }
        
        return view('diaries.index')->with(['diaries' => $diaries, 'keywords' => $keywords, 'is_private' => $is_private, 'year_month' => $year_month]);
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
        $word_count = count(preg_split('/\s+/',$input['content']));
        $diary->word_count = $word_count;
        
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
        $word_count = count(preg_split('/\s+/',$input['content']));
        $diary->word_count = $word_count;
         
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
