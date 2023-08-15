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
            <a href="/diaries/home_diary">
                <button id="diaries-button">To Diaries</button>
            </a>
            <div id="expressions-content">
                @foreach ($expressions as $expression)
                    <h1 class="vocabulary">
                       {{ $expression->vocabulary }} 
                    </h1>
                    <div class="explaination">
                        <div class="content__post">
                             <p>{{ $expression->explaination }}</p> 
                        </div>
                    </div>
                    <a href="/expressions/{{$expression->id}}/show">see more</a>
                    @if($expression->users()->where('user_id', Auth::id())->exists())
                    <div>
                        <form action="{{route('expression_unlikes', $expression)}}" method="POST">
                            @csrf
                            <input type="submit" value="Remove Like">
                        </form>
                    </div>
                    @else
                    <div>
                        <form action="{{route('expression_likes', $expression)}}" method="POST">
                            @csrf
                            <input type="submit" value="Like">
                        </form>
                    </div>
                    @endif
                    <div>
                        <p>Number of Likes: {{$expression->users()->count()}}</p>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{ $expressions->links() }}
                </div>
            </div>
        </body>
    </x-app-layout>
</html>