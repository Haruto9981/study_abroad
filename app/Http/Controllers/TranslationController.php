<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Diary;

class TranslationController extends Controller
{
    public function home_translation(Diary $diary)
    {
        $api_key = config('services.deepl.apikey');
    
        $sentence = $diary->content;

        $response = Http::get(
           
            'https://api-free.deepl.com/v2/translate',
            [
                'auth_key' => $api_key,
                'target_lang' => 'JA',
                'text' => $sentence,
            ]
        );

        $translated_text = $response->json('translations')[0]['text'];

        return redirect('/diaries/home_diary/' . $diary->id)->with(compact('translated_text'));
    }
    
    
    public function index_translation(Diary $diary)
    {
        $api_key = config('services.deepl.apikey');
    
        $sentence = $diary->content;

        $response = Http::get(
           
            'https://api-free.deepl.com/v2/translate',
            [
                'auth_key' => $api_key,
                'target_lang' => 'JA',
                'text' => $sentence,
            ]
        );

        $translated_text = $response->json('translations')[0]['text'];

        return redirect('/diaries/index/' . $diary->id)->with(compact('translated_text'));
    }
    
}
