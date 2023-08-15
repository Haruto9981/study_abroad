<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Follow') }}
           </h2>
        </x-slot>
        <body>
            <h1>Following</h1>
            <a href="/follows/index_follower">
                <button id="expressions-button">To follower</button>
            </a>
           @foreach ($followings as $following)
               <p>{{$following->name}}</p>
               <div>
                    <form action="{{route('unfollowing', $following->id)}}" method="POST">
                    @csrf
                    <input type="submit" value="Unfollow">
                    </form>
                </div>
           @endforeach
            <p>Number of Followings: {{$followings->count()}} </p>
           
        </body>
    </x-app-layout>
</html>