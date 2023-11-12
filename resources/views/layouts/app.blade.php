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
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904207/apple-touch-icon_gg5xce.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904294/favicon-32x32_jhsn7u.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904334/favicon-16x16_g15wzf.png">
        <link rel="mask-icon" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904413/safari-pinned-tab_ja75ta.svg">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        
        <script
          src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
          crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
         
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
 
 
        
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
