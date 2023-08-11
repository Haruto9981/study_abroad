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
                {{ __('Posts') }}
           </h2>
        </x-slot>
        <body>
            <a href="/expressions/home_expression">
                <button id="expressions-button">To Expressions</button>
            </a>
            <div id="diaries-content">
                @foreach ($diaries as $diary)
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
                    @if($diary->users()->where('user_id', Auth::id())->exists())
                    <div>
                        <form action="{{route('diary_unlikes', $diary)}}" method="POST">
                            @csrf
                            <input type="submit" value="Remove Like">
                        </form>
                    </div>
                    @else
                    <div>
                        <form action="{{route('diary_likes', $diary)}}" method="POST">
                            @csrf
                            <input type="submit" value="Like">
                        </form>
                    </div>
                    @endif
                    <div>
                        <p>Number of Likes: {{$diary->users()->count()}} </p>
                    </div>
                    <a href="/diaries/{{$diary->id}}/comment">
                        <button id="comemnt-button">Comment</button>
                    </a>
                @endforeach
                <div class='paginate'>
                    {{ $diaries->links() }}
                </div>
            </div>
        </body>
    </x-app-layout>
</html>