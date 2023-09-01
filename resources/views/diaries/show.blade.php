<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Diary') }}
           </h2>
        </x-slot>
        <body>
            <h1 class="title">
                {{ $diary->title }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <p>{{ $diary->content }}</p> 
                </div>
                <div class="photo">
                    <p class='photo'>{{$diary->photo}}</p>
                </div>
            </div>
            <div class="edit"><a href="/diaries/{{ $diary->id }}/edit">Edit</a></div>
             <img src="{{ asset($diary->photo) }}" width="100px">
            <form action="/diaries/{{ $diary->id }}" id="form_{{ $diary->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteDiary({{ $diary->id }})">Delete</button> 
            </form>
            
            <div class="footer">
                <a href="/diaries/home_diary">Back</a>
            </div>
            <script>
                function deleteDiary(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
     </x-app-layout>
</html>