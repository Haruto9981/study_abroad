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
                {{ __('Expression') }}
           </h2>
        </x-slot>
        <body>
            <h1 class="vocabulary">
                {{ $expression->vocabulary }}
            </h1>
            <div class="explaination">
                <div class="content__post">
                    <p>{{ $expression->explaination }}</p> 
                </div>
            </div>
            <div class="footer">
                <a href="/expressions/home_expression">Back</a>
            </div>
        </body>
     </x-app-layout>
</html>