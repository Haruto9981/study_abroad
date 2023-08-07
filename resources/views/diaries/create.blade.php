<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Diary') }}
           </h2>
        </x-slot>
        <body>
            <form action="/diaries" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="diary[title]" placeholder="Title"/>
                    <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
                </div>
                <div class="content">
                    <h2>Content</h2>
                    <textarea name="diary[content]" placeholder="What's your experience?"></textarea>
                     <p class="content__error" style="color:red">{{ $errors->first('diary.content') }}</p>
                </div>
                <div>
                    <input type="file" name="diary[photo]">
                </div>
                <div class="is_private">
                    <select name="diary[is_private]">
                        <option value="0">private</option>
                        <option value="1">public</option>
                    </select>
                </div>
                <input type="submit" value="Create"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>
