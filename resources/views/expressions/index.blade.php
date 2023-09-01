<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Expression</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Expressions') }}
           </h2>
        </x-slot>
        <body>
            <a href="/expressions/create">
                <button type="button">Add</button>
            </a>
             <section class="text-gray-600 body-font overflow-hidden">
              <div class="container px-5 py-24 mx-auto">
                @foreach ($expressions as $expression)
                    <div class="flex flex-wrap -m-12">
                      <div class="p-12 md:w-1/2 flex flex-col items-start">
                        <a class="inline-flex items-center">
                          <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                          <span class="flex-grow flex flex-col pl-4">
                            <span class="title-font font-medium text-gray-900">{{$expression->user->name}}</span>
                            <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$expression->updated_at}}</span>
                          </span>
                        </a>
                        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{$expression->vocabulary}}</h2>
                        <p class="leading-relaxed mb-8">{{$expression->explaination}}</p>
                        <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                          <a class="inline-flex items-center" href="/expressions/{{$expression->id}}/edit">Edit</a>
                          <form action="/expressions/{{ $expression->id }}" id="form_{{ $expression->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteExpression({{ $expression->id }})">Delete</button> 
                        </form>
                        </div>
                      </div>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{ $expressions->links() }}
                </div>
              </div>
            </section>
            
          
            <script>
                function deleteExpression(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>