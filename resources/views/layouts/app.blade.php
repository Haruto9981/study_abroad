<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Abroad+</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="{{ asset('/favicon/favicon.ico')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/favicons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/storage/favicons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/storage/favicons/favicon-16x16.png')}}">
        <link rel="mask-icon" href="{{ asset('/storage/favicons/safari-pinned-tab.svg" color="#5bbad5')}}">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
