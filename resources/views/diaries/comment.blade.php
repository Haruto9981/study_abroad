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
            <form action='/diaries/{{$diary->id}}/comment' method="POST">
                @csrf
                <input type="hidden" name="comment[diary_id]" value="{{ $diary->id}}"></input>
                <input type="hidden" name="comment[user_id]" value="{{ $user->id}}"></input>
                <div>
                    <lavel>Comment</lavel>
                    <div>
                         <textarea name="comment[body]"></textarea>
                    </div>
                </div>
                <button type="submit">Post Comment</button>
            </form>
            <div>
                @foreach ($diary->comments as $comment)
                    <p>User: {{ $comment->user->name}}</p>
                    <p>DateTime: {{$comment->created_at}}</p>
                    <p>Content: {{$comment->body}}</p>
                @endforeach
            </div>
            <div class="footer">
                <a href="/diaries/home_diary">Back</a>
            </div>
        </body>
     </x-app-layout>
</html>