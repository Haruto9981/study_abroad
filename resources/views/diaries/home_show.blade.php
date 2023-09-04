<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="container px-64 pb-10 mx-auto">
                <br>
                <h1  class="text-4xl">Diary</h1>
                <div class="w-full mb-10 lg:mb-0" >
                    <div class="flex flex-wrap my-8 border border-black rounded-3xl">
                        <div class="p-6 flex flex-col items-start  w-full">
                          <div class="flex border-b border-black pb-4  w-full">
                             <div>
                                <a href="/profile/{{$diary->user->id}}" class="inline-flex items-center">
                                  <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                  <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font font-medium text-gray-900">{{$diary->user->name}} </span>
                                    <span class="title-font font-medium text-gray-900">[{{$diary->user->profile->country}}]</span>
                                    <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$diary->updated_at}}</span>
                                  </span>
                                </a>  
                              </div>
                              <div class="pl-96 pt-2">
                                <h2 class="border border-black rounded px-4 py-2">{{$diary->is_private}}</h2>  
                              </div>  
                          </div>
                          <div>
                              <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-2 mb-4">{{$diary->title}}</h2>
                              <p class="leading-relaxed mb-8">{{$diary->content}}</p>
                          </div>
                          @if($diary->is_private == 'public')
                              <div class="flex items-center flex-wrap border-t border-black mt-auto w-full">
                                  <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 mt-4 ">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            @if($diary->users()->where('user_id', Auth::id())->exists())
                                                <div>
                                                    <form action="{{route('diary_unlikes', $diary)}}" method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            <i class="fa-solid fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div>
                                                    <form action="{{route('diary_likes', $diary)}}" method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                            <div>
                                                <p>{{$diary->users()->count()}} likes</p>
                                            </div>  
                                        </svg>
                                    </span>
                              </div>
                          @endif
                        </div>
                    </div>
                </div>
                <a class="flex justify-center" href="/diaries/home_diary">
                    <button id="expressions-button" class="rounded-lg bg-gray-300 px-4 py-2">Back</button>
                </a>
            </div>
            
            
            <div class="container px-64 mx-auto">
                @if($diary->is_private == 'public')
                    <h1  class="text-4xl">Comments ({{$diary->comments()->count()}})</h1>
                    @if($diary->comments()->count() != 0)
                        <div class="w-full mb-10 lg:mb-0" >
                            <div class="flex flex-wrap my-8 border border-black rounded-3xl p-6">
                                @foreach ($diary->comments as $comment)
                                    <div class="flex flex-col items-start  w-full">
                                        <div class="flex  w-full">
                                            <div>
                                                <a href="/profile/{{$diary->user->id}}" class="inline-flex items-center">
                                                  <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                                  <span class="flex-grow flex flex-col pl-4">
                                                    <span class="title-font font-medium text-gray-900">{{ $comment->user->name}} [{{$comment->user->profile->country}}] </span>
                                                    <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$comment->created_at}}</span>
                                                  </span>
                                                </a>  
                                            </div>
                                        </div>
                                        <div>
                                            <p class="leading-relaxed mb-6">{{$comment->body}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="pt-10">
                        <form action='/diaries/{{$diary->id}}/comment' method="POST">
                            @csrf
                            <input type="hidden" name="comment[diary_id]" value="{{ $diary->id}}"></input>
                            <input type="hidden" name="comment[user_id]" value="{{ $user->id}}"></input>
                            <div>
                                <lavel class="text-2xl">Add a comment</lavel>
                                <div class="py-5">
                                     <textarea class="w-full" name="comment[body]"></textarea>
                                </div>
                            </div>
                            <div class="flex justify-center  py-20">
                                <button class=" rounded px-4 py-2 w-20 bg-gray-300" type="submit">Post</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
            
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