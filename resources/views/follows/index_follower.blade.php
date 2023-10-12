<x-app-layout>
    <body>
        <br>
        <h1  class="text-4xl pl-24">Followers</h1>
        <div class="flex">
            <div class="pl-24 w-52 pt-4">
                <div class="mt-4 p-4 bg-orange-400 text-white font-bold rounded-3xl">
                    <p class="pl-7">{{$followings->count()}} </p>
                    <a href="/follows/index_following">
                        <button id="expressions-button">Following</button>
                    </a>
                </div>
                <div class="mt-4 p-4 bg-orange-400 text-white font-bold rounded-3xl">
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
                                    <a href="/profile/{{$follower->id}}" class="inline-flex">
                                      <img alt="blog"  src="{{ $follower->profile->profile_image_url }}" class="w-16 h-16 rounded-full flex-shrink-0 object-cover object-center">
                                      <span class="flex-grow flex flex-col pl-4 pt-2">
                                        <span class="title-font text-lg text-gray-900">{{$follower->name}}</span>
                                        <span class="title-font font-medium text-gray-900">[{{$follower->profile->country}}]</span>
                                      </span>
                                    </a>  
                                  </div>
                                  <div class="pt-3">
                                    <a href="/profile/{{$follower->id}}/map/?region={{$follower->profile->region}}&country={{$follower->profile->region}}">
                                        <h2 class="bg-orange-400 rounded text-white font-bold px-4 py-2">{{$follower->profile->region}}</h2> 
                                    </a>
                                  </div>
                                       @if($follower->followers()->where('user_id', Auth::id())->exists())
                                           <div class="px-8 pt-3">
                                               <form action="{{route('unfollowing', $follower->id)}}" method="POST">
                                                    @csrf
                                                    <input class="bg-orange-300 rounded text-white font-bold rounded px-4 py-2" type="submit" value="Unfollow">
                                                </form>
                                          </div>
                                       @else
                                          <div class="px-8 pt-3">
                                            <form action="{{route('following', $follower->id)}}" method="POST">
                                                @csrf
                                                <input class="bg-orange-400 rounded text-white font-bold px-4 py-2" type="submit" value="Follow">
                                            </form>
                                          </div>
                                      @endif
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
