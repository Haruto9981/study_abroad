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
        <link rel="shortcut icon" href="{{ asset('/favicon/favicon.ico')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/favicons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/storage/favicons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/storage/favicons/favicon-16x16.png')}}">
        <link rel="mask-icon" href="{{ asset('/storage/favicons/safari-pinned-tab.svg" color="#5bbad5')}}">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <div  class="mix-blend-multiply">
                <a class="block w-32 h-32" href="/">
                    <img src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1694504297/iyfnp36solrghvygndv8.jpg" alt="logo">
                </a>
            </div>
            <div class="w-full sm:max-w-md  px-6 py-4 mb-10 bg-white border border-black shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
