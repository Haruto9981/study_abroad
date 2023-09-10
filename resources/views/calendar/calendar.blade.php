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
        <body>
           <div class="px-36 py-6" id='calendar'></div>
           <div class="pb-20">
                @if ($diff2->invert === 0)
                <h2 class="text-4xl text-center">{{ $diff2->format('%a') + 1 }}days to the start of your SA!</h2>
                @elseif ($diff1->invert === 1)
                <h2 class="text-4xl text-center">Your SA is already over!</h2>
                @else
                <h2 class="text-4xl text-center">{{ $diff1->format('%a') + 1 }}days left to the end of your SA!</h2>
                @endif
            </div>
        </body>
     </x-app-layout>
</html>
