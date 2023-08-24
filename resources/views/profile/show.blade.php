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
            <h1 class="username">
                UserName: {{ $user->name}}
            </h1>
            <h1 class="email">
                Email: {{ $user->email}}
            </h1>
            <h1 class="gender">
                Gender: {{ $user->profile->gender}}
            </h1>
            <h1 class="country">
                Abroad to Study: {{ $user->profile->country}}
            </h1>
            <h1 class="region">
                Region: {{ $user->profile->region}}
            </h1>
            <h1 class="start_date">
                Start Date of SA: {{ $user->profile->start_date}}
            </h1>
            <h1 class="end_date">
                End Date of SA: {{ $user->profile->end_date}}
            </h1>
            <h1 class="bio">
                Bio: {{ $user->profile->bio}}
            </h1>
            
            
            <div class="footer">
                <a href="/diaries/home_diary">Back</a>
            </div>
        </body>
     </x-app-layout>
</html>