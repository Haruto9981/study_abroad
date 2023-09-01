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
        <x-slot name="header">
           <h2 class="text-2xl text-gray-800 leading-tight">
                {{ __('Home') }}
           </h2>
        </x-slot>
         <body>
              <br>
              <h1  class="text-4xl pl-24">Posts</h1>
              <a class="flex justify-center pr-36" href="/diaries/home_diary">
                <button id="diaries-button" class="rounded-lg bg-gray-300 px-4 py-2">Diaries</button>
              </a>
              <div class="container px-5 py-7 mx-auto flex">
                <div class="lg:w-1/2 w-full mb-10 lg:mb-0">
                    @foreach ($expressions as $expression)
                        <div class="flex flex-wrap -m-12">
                          <div class="p-12 flex flex-col items-start">
                            <a href="/profile/{{$expression->user->id}}" class="inline-flex items-center">
                              <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                              <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">{{$expression->user->name}}</span>
                                <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$expression->updated_at}}</span>
                              </span>
                            </a>
                            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{$expression->vocabulary}}</h2>
                            <p class="leading-relaxed mb-8">{{ $expression->explaination}}</p>
                            <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                              <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 ">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    @if($expression->users()->where('user_id', Auth::id())->exists())
                                        <div>
                                            <form action="{{route('expression_unlikes', $expression)}}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div>
                                            <form action="{{route('expression_likes', $expression)}}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    <div>
                                        <p>{{$expression->users()->count()}} likes</p>
                                    </div>  
                                </svg>
                              </span>
                            </div>
                          </div>
                        </div>
                    @endforeach
                    <div class='paginate'>
                        {{ $expressions->links() }}
                    </div>
                </div>
                <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12">
                    <a  href="/calendar">
                        <h1 class="text-4xl text-center">{{$user->name}}'s Calendar</h1>
                    </a>
                    <br>
                    <br>
                    <div id='calendar'></div>
                    <br>
                    @if($diff->d ===0)<h2 class="text-4xl">Your SA is already over!</h2>
                    @else<h2 class="text-4xl text-center">{{ $diff->d }}days left to the end of your SA!</h2>
                    @endif
                </div>
              </div>
        </body>
    </x-app-layout>
</html>