<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
           </h2>
        </x-slot>
        <body>
            <button id="diaries-button">Diaries</button>
            <button id="expressions-button">Expressions</button>
            <div id="diaries-content">
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
            <div id="expressions-content">
                @foreach ($expressions as $expression)
                    @if ($expression->user_id !== $user->id)
                        @if ($expression->is_private === 1)
                            <h1 class="vocabulary">
                                {{ $expression->vocabulary }}
                            </h1>
                            <div class="explaination">
                                <div class="content__post">
                                    <p>{{ $expression->explaination }}</p> 
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            
            <script>
                let $diaries_button = document.getElementById("diaries-button");
                let $diaries_content = document.getElementById("diaries-content");
                let $expressions_button = document.getElementById("expressions-button");
                let $expressions_content = document.getElementById("expressions-content");
              
                
                reset_styles = function() {
                  $expressions_button.classList.remove("active");
                  $diaries_button.classList.remove("active");
                  $expressions_content.classList.remove("active");
                  $diaries_content.classList.remove("active");
                };
                
                $expressions_button.addEventListener("click", function() {
                  reset_styles();
                  if (this.classList.toggle("active")) {
                    $expressions_content.classList.toggle("active");
                  }
                })
                $diaries_button.addEventListener("click", function() {
                  reset_styles();
                  if (this.classList.toggle("active")) {
                    $diaries_content.classList.toggle("active");
                  }
                });
                
                  // デフォルトで未完了のみ表示
                $diaries_content.classList.toggle("active");
                $diaries_button.classList.toggle("active")
            </script>
        </body>
    </x-app-layout>
</html>