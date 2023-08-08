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
            <div　class="content">
                @foreach ($diaries as $diary)
                    @if ($diary->user_id !== $user->id)
                        @if ($diary->is_private === 1)
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
                        @endif
                    @endif
                @endforeach
            </div>
        </body>
    </x-app-layout>
</html>