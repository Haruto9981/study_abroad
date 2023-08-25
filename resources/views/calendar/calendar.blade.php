<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Calendar') }}
           </h2>
        </x-slot>
        <body>
           <div id='calendar'></div>
            @if($diff->d ===0)<h2>Your SA is already over!</h2>
            @else<h2>{{ $diff->d }}days left to the end of your SA!</h2>
            @endif
        </body>
     </x-app-layout>
</html>