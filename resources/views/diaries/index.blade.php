<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Diaries') }}
           </h2>
        </x-slot>
        <body>
            <a href="/diaries/create">
                <button type="button">Create</button>
            </a>
           <section class="text-gray-600 body-font overflow-hidden">
              <div class="container px-5 py-24 mx-auto">
                @foreach ($diaries as $diary)
                    <div class="flex flex-wrap -m-12">
                      <div class="p-12 md:w-1/2 flex flex-col items-start">
                        <a class="inline-flex items-center">
                          <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                          <span class="flex-grow flex flex-col pl-4">
                            <span class="title-font font-medium text-gray-900">{{$diary->user->name}}</span>
                            <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$diary->updated_at}}</span>
                          </span>
                        </a>
                        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{$diary->title}}</h2>
                        <p class="leading-relaxed mb-8">{{$diary->content}}</p>
                        <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                          <a class="text-indigo-500 inline-flex items-center" href="/diaries/{{$diary->id}}">See More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14"></path>
                              <path d="M12 5l7 7-7 7"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{ $diaries->links() }}
                </div>
              </div>
            </section>
            <script>
                function deleteDiary(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>



