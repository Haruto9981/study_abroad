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
        <link rel="apple-touch-icon" sizes="180x180" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904207/apple-touch-icon_gg5xce.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904294/favicon-32x32_jhsn7u.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904334/favicon-16x16_g15wzf.png">
        <link rel="mask-icon" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904413/safari-pinned-tab_ja75ta.svg">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        
        <script> 
            function countWords(words) { 
              
                let count = 0; 
              
                let split = words.split(' '); 
              
                for (let i = 0; i < split.length; i++) { 
                    if (split[i] != "") { 
                        count += 1; 
                    } 
                } 
              
                document.getElementById("inputlength") 
                    .innerHTML = count;
            } 
        </script>
        
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
