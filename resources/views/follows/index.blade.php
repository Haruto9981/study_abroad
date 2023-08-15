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
            @foreach($users as $user)
                @foreach($user->followers as $following)
                   <p>{{$following->name}}</p>
                @endforeach
            @endforeach
        </body>
    </x-app-layout>
</html>