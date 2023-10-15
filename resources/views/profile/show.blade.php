<x-app-layout>
    <body>
        <div class="mx-96 my-20 border border-black py-10 rounded-3xl">
            <h1 class="text-4xl ml-10 my-4">Profile</h1>
            <div class="flex justify-center">
                <img alt="Profile image"  src="{{ $user->profile->profile_image_url }}" class="w-32 h-32 rounded-full  object-cover object-center">
            </div>
            @if($user->id !== Auth::user()->id)
                @if($user->followers()->where('user_id', Auth::user()->id)->exists())
                    <div class="rounded-lg text-white font-bold bg-orange-300 ml-10 rounded flex justify-center px-6 py-2 w-28">
                        <form action="{{route('unfollowing', $user->id)}}" method="POST">
                            @csrf
                            <input type="submit" value="Unfollow">
                        </form>
                    </div>
                @else
                    <div class="rounded-lg text-white font-bold bg-orange-400 ml-10 rounded flex justify-center px-6 py-2 w-28">
                        <form action="{{route('following', $user->id)}}" method="POST">
                            @csrf
                            <input type="submit" value="Follow">
                        </form>
                    </div>
                @endif
            @endif
            <div class="border border-black mx-10 my-6 p-4 text-2xl">
                <p class="py-2">Name: {{ $user->name}}</p>
                <p class="py-2">Email: {{ $user->email}}<p>
                <p class="py-2">Gender: {{ $user->profile->gender}}<p>
                <p class="py-2">Abroad to Study: {{ $user->profile->country}}<p>
                <p class="py-2">Region: {{ $user->profile->region}}<p>
                <p class="py-2">Start Date of SA: {{ $user->profile->start_date}}<p>
                <p class="py-2">End Date of SA: {{ $user->profile->end_date}}<p>
                <p class="py-2">Bio: {{ $user->profile->bio}}<p>
            </div>
            <div class="flex justify-center">
                <div class="rounded-lg text-white font-bold bg-orange-300 flex justify-center rounded px-4 py-2 w-20">
                    <a onclick="history.back()">Back</a>
                </div>
            </div>
        </div>
    </body>
 </x-app-layout>
