<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <br>
            <h1  class="text-4xl pl-24">Following</h1>
            <div class="flex">
                <div class="pl-24 w-52 pt-4">
                    <div class="mt-4 p-4 bg-orange-400 text-white font-bold rounded-3xl">
                        <p class="pl-7">{{$followings->count()}} </p>
                        <h2>Following</h2>
                    </div>
                    <div class="mt-4 p-4 bg-orange-400 text-white font-bold rounded-3xl">
                        <p class="pl-7">{{$followers->count()}}</p>
                        <a href="/follows/index_follower">
                        <button id="expressions-button">Followers</button>
                    </a>
                    </div>
                </div>
                <div class="container pb-10 mx-auto w-2/5">
                    <div class="mb-10 lg:mb-0" >
                        @foreach ($followings as $following)
                            <div class=" my-8 border border-black rounded-3xl">
                              <div class="m-3  items-start">
                                  <div class="flex justify-between">
                                     <div>
                                        <a href="/profile/{{$following->id}}" class="inline-flex">
                                          <img alt="blog" src="{{ asset('storage/profiles/'. $following->profile->profile_image) }}" class="w-16 h-16 rounded-full flex-shrink-0 object-cover object-center">
                                          <span class="flex-grow flex flex-col pl-4 pt-2">
                                            <span class="title-font text-lg text-gray-900">{{$following->name}}</span>
                                            <span class="title-font font-medium text-gray-900">[{{$following->profile->country}}]</span>
                                          </span>
                                        </a>  
                                      </div>
                                      <div class="pt-3">
                                        <h2 class="bg-orange-400 rounded text-white font-bold px-4 py-2">{{$following->profile->region}}</h2>  
                                      </div>
                                       <div class="px-8 pt-3">
                                           <form action="{{route('unfollowing', $following->id)}}" method="POST">
                                                @csrf
                                                <input class="bg-orange-300 rounded text-white font-bold px-4 py-2" type="submit" value="Unfollow">
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