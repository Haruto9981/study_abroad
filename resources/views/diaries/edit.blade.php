<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
     <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Diary') }}
           </h2>
        </x-slot>
        <body>
            <form action="/diaries/{{ $diary->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="diary[title]" value="{{ $diary->title }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
                </div>
                <div class="content">
                    <h2>Content</h2>
                    <input type="text" name="diary[content]" value="{{ $diary->content }}"/>
                     <p class="content__error" style="color:red">{{ $errors->first('diary.content') }}</p>
                </div>
                <input type="submit" value="Save"/>
            </form>
            <div class="footer">
                <a href="/diaries/index">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>
