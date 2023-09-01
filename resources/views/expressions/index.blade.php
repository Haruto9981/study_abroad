<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Expression</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Expressions') }}
           </h2>
        </x-slot>
        <body>
          
           <div class="container px-64 pb-10 mx-auto">
                <br>
                <h1  class="text-4xl">My Expressions</h1>
                <a class="flex justify-end" href="/expressions/create">
                    <button id="expressions-button" class="rounded-lg bg-gray-300 px-4 py-2">Add</button>
                </a>
                <div class="w-full mb-10 lg:mb-0" >
                    @foreach ($expressions as $expression)
                        <div class="flex flex-wrap my-16 border border-black rounded-3xl">
                          <div class="p-6 flex flex-col items-start  w-full">
                              <div class="flex border-b border-black pb-4  w-full">
                                 <div>
                                    <a href="/profile/{{$expression->user->id}}" class="inline-flex items-center">
                                      <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                      <span class="flex-grow flex flex-col pl-4">
                                        <span class="title-font font-medium text-gray-900">{{$expression->user->name}} </span>
                                        <span class="title-font font-medium text-gray-900">[{{$expression->user->profile->country}}]</span>
                                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$expression->updated_at}}</span>
                                      </span>
                                    </a>  
                                  </div>
                                  <div class="pl-96 pt-2">
                                    <h2 class="border border-black rounded px-4 py-2">{{$expression->is_private}}</h2>  
                                  </div>  
                              </div>
                            <div>
                                <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-2 mb-4">{{$expression->vocabulary}}</h2>
                                <p class="leading-relaxed mb-4">Meaning: {{$expression->meaning}}</p>
                                <p class="leading-relaxed mb-4">Example Sentence: {{$expression->example}}</p>
                            </div>
                            <div class="flex items-center flex-wrap border-t border-black mt-auto w-full">
                              <a class="text-indigo-500 inline-flex items-center mt-4" href="/diaries/{{$expression->id}}">See More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M5 12h14"></path>
                                  <path d="M12 5l7 7-7 7"></path>
                                </svg>
                              </a>
                              <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 mt-4 ">
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
            </div>
        </body>
    </x-app-layout>
</html>