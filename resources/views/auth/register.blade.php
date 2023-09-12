<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <h2 class="text-xl">Fill in your Profile</h2>
        
        <div class="mt-2 mb-4">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" class="block mt-1 w-full rounded-lg" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <div class="my-4">
            <label for="gender">{{ __('Gender') }}</label>
            <table>
                <tr>
                    <th class="px-1"><input id="gender-m" class="block mt-1" type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : ''}}  required autofocus /></th>
                    <td><label for="gender-m">{{__('Male')}}</label></td>
                    <th class="px-1"><input id="gender-f" class="block mt-1" type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : ''}}  required autofocus /></th>
                    <td> <label for="gender-f">{{__('Female')}}</label></td>
                    <th class="px-1"><input id="gender-o" class="block mt-1" type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : ''}}  required autofocus /></th>
                    <td> <label for="gender-o">{{__('Other')}}</label></td>
                </tr>
            </table>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="my-4">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full rounded-lg" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
       
        <div class="my-4">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="block mt-1 w-full rounded-lg" type="password" name="password" value="{{old('password')}}" required autofocus autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> 
        
        <div class="my-4">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="block mt-1 w-full  rounded-lg" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" required autofocus autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> 
        
        <div class="my-4">
            <div class="mb-1">
                <label for="country">{{ __('Abroad to Study') }}</label>
            </div>
            <select name="country" class="rounded-lg">
                <option value="USA 🇺🇸" {{ old('country') == 'USA 🇺🇸' ? 'selected' : ''}}>USA</option>
                <option value="UK 🇬🇧" {{ old('country') == 'UK 🇬🇧' ? 'selected' : ''}}>UK</option>
                <option value="Australia 🇦🇺" {{ old('country') == 'Australia 🇦🇺' ? 'selected' : ''}}>Australia</option>
                <option value="NewZealand 🇳🇿" {{ old('country') == 'NewZealand 🇳🇿' ? 'selected' : ''}}>NewZealand</option>
                <option value="Canada 🇨🇦" {{ old('country') == 'Canada 🇨🇦' ? 'selected' : ''}}>Canada</option>
                <option value="Germany 🇩🇪" {{ old('country') == 'Germany 🇩🇪' ? 'selected' : ''}}>Germany</option>
                <option value="France 🇫🇷" {{ old('country') == 'France 🇫🇷' ? 'selected' : ''}}>France</option>
                <option value="Taiwan 🇹🇼" {{ old('country') == 'Taiwan 🇹🇼' ? 'selected' : ''}}>Taiwan</option>
                <option value="China 🇨🇳" {{ old('country') == 'China 🇨🇳' ? 'selected' : ''}}>China</option>
            </select>
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div> 
        
        <div class="my-4">
            <label for="region">{{ __('Region') }}</label>
            <input id="region" class="block mt-1 w-full rounded-lg" type="text" name="region" value="{{old('region')}}" required autofocus />
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div> 
        
        <div class="my-4">
            <label for="start_date">{{ __('Start Date of Your Study Abroad') }}</label>
            <input id="start_date" class="block mt-1 w-full rounded-lg" type="date" name="start_date" value="{{old('start_date')}}" required autofocus />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div> 
        
        <div class="my-4">
            <label for="end_date">{{ __('End Date of Your Study Abroad') }}</label>
            <input id="end_date" class="block mt-1 w-full rounded-lg" type="date" name="end_date" value="{{old('end_date')}}" required autofocus />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div> 

       

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
