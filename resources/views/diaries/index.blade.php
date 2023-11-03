<x-app-layout>
    <body>
        <div class="container px-64 pb-10 mx-auto">
            <br>
            <h1  class="text-4xl font-medium">My Diaries</h1>
            
            <div class="my-10">
                <form class="inline-block" method="GET" action="{{ route('index') }}">
                    @csrf
                    
                    <input class="rounded-3xl mr-2" type="month" name="year_month" min="2000-1" max="2050-12" value="{{old('year_month', $year_month)}}">
                    
                    <select class="rounded-3xl mr-2" name='is_private'>
                        <option value='all' {{ old('is_private', $is_private) == 'both' ? 'selected' : ''}}>all</option>
                        <option value='public' {{ old('is_private', $is_private) == 'public' ? 'selected' : ''}}>only public</option>
                        <option value='private' {{ old('is_private', $is_private) == 'private' ? 'selected' : ''}}>only private</option>
                    </select>
                   
                    <input class="rounded-xl mr-2" type="search" name="keywords" placeholder="Keyword" value="@if (isset($keywords)) {{ $keywords }} @endif">
                    
                    <input class="rounded-lg text-white font-bold  bg-orange-300 hover:bg-orange-400 px-4 py-2" type="submit" value="search">
                </form>
                <div class="inline-block ml-2">
                    <button onclick="location.href='/diaries/index'" class="rounded-2xl text-white font-bold bg-gray-300 hover:bg-gray-400 px-2 py-1">Clear</button>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button onclick="location.href='/diaries/create'" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Create</button>
            </div>
               
           
            <div class="w-full mb-10 lg:mb-0" >
                @foreach ($diaries as $diary)
                    <div class="flex flex-wrap my-16 border border-black rounded-3xl">
                      <div class="p-6 flex flex-col items-start  w-full">
                          <div class="flex border-b border-black pb-4  w-full">
                             <div>
                                <a href="/profile/{{$diary->user->id}}" class="inline-flex items-center">
                                  <img alt="blog" src="{{ $diary->user->profile->profile_image_url }}" class="w-16 h-16 rounded-full flex-shrink-0 object-cover object-center">
                                  <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font text-lg text-gray-900">{{$diary->user->name}} </span>
                                    <span class="title-font font-medium text-gray-900">[{{$diary->user->profile->country}}]</span>
                                    <span class="text-blue-600  text-xs tracking-widest mt-0.5">{{$diary->updated_at}}</span>
                                  </span>
                                </a>  
                              </div>
                              <div class="pl-96 pt-2">
                                <h2 class="rounded text-white font-bold  bg-orange-400 px-4 py-2">{{$diary->is_private}}</h2>  
                              </div>  
                          </div>
                        <div>
                            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-2 mb-1">{!! $diary->title !!}</h2>
                            <p class="mb-4">(Word Count: {{$diary->word_count}})</p>
                            <p class="leading-relaxed mb-2">{!! $diary->content !!}</p>
                            @if($diary->photo_url != null)
                                <img alt="blog" src="{{ $diary->photo_url }}" class="mb-8 w-auto h-96">
                            @endif
                        </div>
                        <div class="flex items-center flex-wrap border-t border-black mt-auto w-full">
                          <a class="text-indigo-500 inline-flex items-center mt-4" href="/diaries/index/{{$diary->id}}">See More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14"></path>
                              <path d="M12 5l7 7-7 7"></path>
                            </svg>
                          </a>
                               @if($diary->is_private == 'public')
                                  <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 mt-4 ">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            @if($diary->users()->where('user_id', Auth::id())->exists())
                                                <div>
                                                    <form action="{{route('diary_unlikes', $diary)}}" method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            <i class="fa-solid fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div>
                                                    <form action="{{route('diary_likes', $diary)}}" method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                             <i class="fa-regular fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                            <div class="pl-2">
                                                <p>{{$diary->users()->count()}} likes</p>
                                            </div>  
                                        </svg>
                                    </span>
                                    <span class="inline-flex items-center leading-none mt-4">
                                       <a href="/diaries/index/{{$diary->id}}">
                                            <button id="comemnt-button">
                                                <i class="fa-regular fa-comment fa-flip-horizontal fa-xl" style="color: #3878e5;"></i>
                                            </button>
                                        </a>
                                        <div class="pl-2">
                                            <p>{{$diary->comments()->count()}} comments</p>
                                        </div>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{ $diaries->links() }}
                </div>
            </div>
        </div>
    </body>
</x-app-layout>



