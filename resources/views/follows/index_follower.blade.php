<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <br>
            <h1  class="text-4xl pl-24">Followers</h1>
            <div class="flex">
                <div class="pl-24 w-52 pt-4">
                    <div class="mt-4 p-4 border border-black">
                        <p class="pl-7">{{$followings->count()}} </p>
                        <a href="/follows/index_following">
                            <button id="expressions-button">Following</button>
                        </a>
                    </div>
                    <div class="mt-4 p-4 border border-black">
                        <p class="pl-7">{{$followers->count()}}</p>
                        <h2>Followers</h2>
                    </div>
                </div>
                
            
                <div class="container pb-10 mx-auto w-2/5">
                    <div class="mb-10 lg:mb-0" >
                        @foreach ($followers as $follower)
                            <div class=" my-8 border border-black rounded-3xl">
                              <div class="m-3  items-start">
                                  <div class="flex justify-between">
                                     <div>
                                        <a href="/profile/{{$follower->id}}" class="inline-flex items-cente">
                                          <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                          <span class="flex-grow flex flex-col pl-4">
                                            <span class="title-font font-medium text-gray-900">{{$follower->name}}</span>
                                            <span class="title-font font-medium text-gray-900">[{{$follower->profile->country}}]</span>
                                          </span>
                                        </a>  
                                      </div>
                                      <div class="pt-1">
                                        <h2 class="border border-black rounded px-4 py-2">{{$follower->profile->region}}</h2>  
                                      </div>
                                       <div class="px-8 pt-1">
                                           <form action="{{route('unfollowing', $follower->id)}}" method="POST">
                                                @csrf
                                                <input class="border border-black rounded px-4 py-2" type="submit" value="Unfollow">
                                            </form>
                                      </div>  
                                  </div>
                              </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>