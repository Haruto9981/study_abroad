<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <br>
            <a  href="/calendar">
                <h1 class="text-3xl text-center">{{$user->name}}'s Calendar</h1>
            </a>
            <br>
            <div class="text-4xl text-center">
                @if ($diff2->invert === 0)
                <h2><span class="text-red-500 font-bold">{{ $diff2->format('%a') + 1 }}days</span> to the start of your SA!</h2>
                @elseif ($diff1->invert === 1)
                <h2 class="text-red-500 font-bold">Your SA is already over!</h2>
                @else
                <h2><span class="text-red-500 font-bold">{{ $diff1->format('%a') + 1 }}days</span> left to the end of your SA!</h2>
                @endif
            </div>
            <br>
            <div class="px-36 py-6" id='calendar'></div>
        </body>
     </x-app-layout>
</html>
