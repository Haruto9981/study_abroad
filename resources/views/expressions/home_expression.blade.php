<x-app-layout>
     <body>
          <br>
          <h1  class="text-4xl pl-24">Posts</h1>
           <div class="my-10">
                <form class="inline-block pl-24" method="GET" action="{{ route('home_expression') }}">
                    @csrf
                    
                    <select name="country" class="rounded-3xl mr-2">
                        <option value="">Choose country</option>
                        <option value="USA 🇺🇸" {{ old('country', $country) == 'USA 🇺🇸' ? 'selected' : ''}}>USA</option>
                        <option value="UK 🇬🇧" {{ old('country', $country) == 'UK 🇬🇧' ? 'selected' : ''}}>UK</option>
                        <option value="Australia 🇦🇺" {{ old('country', $country) == 'Australia 🇦🇺' ? 'selected' : ''}}>Australia</option>
                        <option value="NewZealand 🇳🇿" {{ old('country', $country) == 'NewZealand 🇳🇿' ? 'selected' : ''}}>NewZealand</option>
                        <option value="Canada 🇨🇦" {{ old('country', $country) == 'Canada 🇨🇦' ? 'selected' : ''}}>Canada</option>
                        <option value="Germany 🇩🇪" {{ old('country', $country) == 'Germany 🇩🇪' ? 'selected' : ''}}>Germany</option>
                        <option value="Francse 🇫🇷" {{ old('country', $country) == 'France 🇫🇷' ? 'selected' : ''}}>France</option>
                        <option value="Taiwan 🇹🇼" {{ old('country', $country) == 'Taiwan 🇹🇼' ? 'selected' : ''}}>Taiwan</option>
                        <option value="China 🇨🇳" {{ old('country', $country) == 'China 🇨🇳' ? 'selected' : ''}}>China</option>
                    </select>
                   
                    <input class="rounded-xl mr-2" type="search" name="region" placeholder="Region" value="@if (isset($region)) {{ $region }} @endif">
                    
                    <input class="rounded-lg text-white font-bold  bg-orange-300 hover:bg-orange-400 px-4 py-2" type="submit" value="search">
                </form>
                
                <div class="inline-block ml-2">
                    <button onclick="location.href='/expressions/home_expression'" class="rounded-2xl text-white font-bold bg-gray-300 hover:bg-gray-400 px-2 py-1">Clear</button>
                </div>
            </div>
          <div class="flex justify-center pr-36">
            <button onclick="location.href='/diaries/home_diary'" id="expressions-button" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Diaries</button>
          </div>
          <div class="container px-5 pb-10 mx-auto flex">
            <div class="lg:w-1/2 w-full mb-10 lg:mb-0" >
                @foreach ($expressions as $expression)
                    <div class="flex flex-wrap my-16 border border-black rounded-3xl">
                      <div class="p-6 flex flex-col items-start  w-full">
                          <div class="flex border-b border-black pb-4  w-full">
                             <div>
                                <a href="/profile/{{$expression->user->id}}" class="inline-flex items-center">
                                  <img alt="blog" src="{{ $expression->user->profile->profile_image_url }}" class="w-16 h-16 rounded-full flex-shrink-0 object-cover object-center">
                                  <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font text-lg text-gray-900">{{$expression->user->name}} </span>
                                    <span class="title-font font-medium text-gray-900">[{{$expression->user->profile->country}}]</span>
                                    <span class="text-blue-600 text-xs tracking-widest mt-0.5">{{$expression->updated_at}}</span>
                                  </span>
                                </a>  
                              </div>
                              <div class="pl-52 pt-2">
                                <a href="/profile/{{$expression->user->id}}/map/?region={{$expression->user->profile->region}}&country={{$expression->user->profile->country}}">
                                    <h2 class="bg-orange-400 hover:bg-orange-300 text-white font-bold rounded px-4 py-2">{{$expression->user->profile->region}}</h2>
                                </a>
                              </div>  
                          </div>
                        <div>
                            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-2 mb-4">{{$expression->vocabulary}}</h2>
                            <p class="leading-relaxed mb-4 text-xl">Meaning: <span class="font-bold">{{$expression->meaning}}</span></p>
                            <p class="leading-relaxed mb-4 text-xl">Example: {{$expression->example}}</p>
                        </div>
                        <div class="flex items-center flex-wrap border-t border-black mt-auto w-full">
                          <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 mt-4">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                @if($expression->users()->where('user_id', Auth::user()->id)->exists())
                                    <div>
                                        <form action="{{route('expression_unlikes', $expression)}}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                 <i class="fa-solid fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div>
                                        <form action="{{route('expression_likes', $expression)}}" method="POST">
                                            @csrf
                                            <button type="submit">
                                               <i class="fa-regular fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <div class="pl-2">
                                    <p>{{$expression->users()->count()}} likes</p>
                                </div>  
                            </svg>
                          </span>
                        </div>
                      </div>
                    </div>
                @endforeach
                @if($expressions != false)
                    <div class='paginate'>
                        {{ $expressions->links() }}
                    </div>
                @endif
            </div>
            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12">
                <a  href="/calendar">
                    <h1 class="text-3xl text-center">{{$user->name}}'s Calendar</h1>
                </a>
                <br>
                <div class="text-4xl text-center">
                    @if ($diff2->invert === 0)
                    <h2><span class="text-red-500 font-bold">{{ $diff2->format('%a') + 1 }}days</span> to the start of your SA!</h2>
                    @elseif ($diff1->invert === 1)
                    <h2 class="text-red-500 font-bold">Your SA is already over!</h2>
                    @else
                    <h2><span class="text-red-500 font-bold">{{ $diff1->format('%a') + 1 }}days</span> left to the end of your SA!</h2>
                    @endif
                </div>
                <br>
                <div id='calendar'></div>
                <br>
            </div>
          </div>
          <script>
            function deleteDiary(id) {
                'use strict'
        
                if (confirm('Do you really want to delete it?')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>
