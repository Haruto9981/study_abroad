<section>
    <header>
        <h2 class="text-2xl text-gray-900">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        
        <input type="hidden" name="profile[user_id]" value="{{ $user->id}}"></input>
        
        
        <div class="flex justify-center">
            <label for="profile-image">
                <img alt="Profile image" src="{{ asset('storage/profiles/'. $user->profile->profile_image) }}" class="w-32 h-32 rounded-full  object-cover object-center">
                <input id="profile-image" name="profile[profile_image]" type="file" class="form-control @error('profile-image') is-invalid @enderror" style="display:none;" value="" accept="image/png, image/jpeg">
                <p  style="color:red">{{ $errors->first('profile.profile_image') }}</p>
            </label>
        </div>

        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" class="block mt-1 w-full rounded-lg" type="text" name="name" value="{{old('name', $user->name)}}" required autofocus autocomplete="name" />
             <p  style="color:red">{{ $errors->first('name') }}</p>
        </div>
        
        <div>
            <label for="gender">{{ __('Gender') }}</label>
            <table>
                <tr>
                    <th class="px-1"><input id="gender-m" class="block mt-1" type="radio" name="profile[gender]" value="male" {{ old('profile[gender]', $user->profile->gender) == 'male' ? 'checked' : ''}} required autofocus /></th>
                    <td><label for="gender-m">{{__('Male')}}</label></td>
                    <th class="px-1"><input id="gender-f" class="block mt-1" type="radio" name="profile[gender]" value="female" {{ old('profile[gender]', $user->profile->gender) == 'female' ? 'checked' : ''}} required autofocus /></th>
                    <td> <label for="gender-f">{{__('Female')}}</label></td>
                    <th class="px-1"><input id="gender-o" class="block mt-1" type="radio" name="profile[gender]" value="other" {{ old('profile[gender]', $user->profile->gender) == 'other' ? 'checked' : ''}} required autofocus /></th>
                    <td><label for="gender-o">{{__('Other')}}</label></td>
                </tr>
            </table>
            <p  style="color:red">{{ $errors->first('profile.gender') }}</p>
        </div>

        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full rounded-lg" type="email" name="email" value="{{old('email', $user->email)}}" required autofocus autocomplete="username" />
            <p  style="color:red">{{ $errors->first('email') }}</p>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        
        <div>
            <div class="mb-1">
              <label for="country">{{ __('Abroad to Study') }}</label>  
            </div>
            <select name="profile[country]" class="rounded-lg">
                <option value="USA 🇺🇸" {{ old('profile[country]', $user->profile->country) == 'USA 🇺🇸' ? 'selected' : ''}}>USA</option>
                <option value="UK 🇬🇧" {{ old('profile[country]', $user->profile->country) == 'UK 🇬🇧' ? 'selected' : ''}}>UK</option>
                <option value="Australia 🇦🇺" {{ old('profile[country]', $user->profile->country) == 'Australia 🇦🇺' ? 'selected' : ''}}>Australia</option>
                <option value="NewZealand 🇳🇿" {{ old('profile[country]', $user->profile->country) == 'NewZealand 🇳🇿' ? 'selected' : ''}}>NewZealand</option>
                <option value="Canada 🇨🇦" {{ old('profile[country]', $user->profile->country) == 'Canada 🇨🇦' ? 'selected' : ''}}>Canada</option>
                <option value="Germany 🇩🇪" {{ old('profile[country]', $user->profile->country) == 'Germany 🇩🇪' ? 'selected' : ''}}>Germany</option>
                <option value="France 🇫🇷" {{ old('profile[country]', $user->profile->country) == 'France 🇫🇷' ? 'selected' : ''}}>France</option>
                <option value="Taiwan 🇹🇼" {{ old('profile[country]', $user->profile->country) == 'Taiwan 🇹🇼' ? 'selected' : ''}}>Taiwan</option>
                <option value="China 🇨🇳" {{ old('profile[country]', $user->profile->country) == 'China 🇨🇳' ? 'selected' : ''}}>China</option>
            </select>
            <p  style="color:red">{{ $errors->first('profile.country') }}</p>
        </div>
        
        <div>
            <label for="region">{{ __('Region') }}</label>
            <input id="region" class="block mt-1 w-full rounded-lg" type="text" name="profile[region]" value="{{old('region', $user->profile->region)}}" required autofocus />
           <p  style="color:red">{{ $errors->first('profile.region') }}</p>
        </div> 
        
        <div>
            <label for="start_date">{{ __('Start Date of Your Study Abroad') }}</label>
            <input id="start_date" class="block mt-1 w-full rounded-lg" type="date" name="profile[start_date]" value="{{old('start_date', $user->profile->start_date)}}" required autofocus />
            <p  style="color:red">{{ $errors->first('profile.start_date') }}</p>
        </div>
        
        <div>
            <label for="end_date">{{ __('End Date of Your Study Abroad') }}</label>
            <input id="end_date" class="block mt-1 w-full rounded-lg" type="date" name="profile[end_date]" value="{{old('end_date', $user->profile->end_date)}}" required autofocus />
            <p  style="color:red">{{ $errors->first('profile.end_date') }}</p>
        </div> 
        
        <div>
            <label for="bio">{{ __('Bio') }}</label>
            <input id="bio" class="block mt-1 w-full rounded-lg" type="text" name="profile[bio]" value="{{old('bio', $user->profile->bio)}}" />
             <p  style="color:red">{{ $errors->first('profile.bio') }}</p>
        </div> 

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
