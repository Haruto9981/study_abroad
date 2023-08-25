<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <div>
            <label for="gender">{{ __('Gender') }}</label>
            <table>
                <tr>
                    <th><input id="gender-m" class="block mt-1" type="radio" name="gender" value="male" required autofocus /></th>
                    <td><label for="gender-m">{{__('Male')}}</label></td>
                    <th><input id="gender-f" class="block mt-1" type="radio" name="gender" value="female" required autofocus /></th>
                    <td> <label for="gender-f">{{__('Female')}}</label></td>
                    <th><input id="gender-o" class="block mt-1" type="radio" name="gender" value="other" required autofocus /></th>
                    <td> <label for="gender-o">{{__('Other')}}</label></td>
                </tr>
            </table>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
       
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" value="{{old('password')}}" required autofocus autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> 
        
        <div>
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" required autofocus autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> 
        
        <div>
            <label for="country">{{ __('Abroad to Study') }}</label>
            <select name="country">
                <option value="USA 🇺🇸">USA</option>
                <option value="UK 🇬🇧">UK</option>
                <option value="Australia 🇦🇺">Australia</option>
                <option value="NewZealand 🇳🇿">NewZealand</option>
                <option value="Canada 🇨🇦">Canada</option>
                <option value="Germany 🇩🇪">Germany</option>
                <option value="France 🇫🇷">France</option>
                <option value="Taiwan 🇹🇼">Taiwan</option>
                <option value="China 🇨🇳">China</option>
            </select>
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div> 
        
        <div>
            <label for="region">{{ __('Region') }}</label>
            <input id="region" class="block mt-1 w-full" type="text" name="region" value="{{old('region')}}" required autofocus />
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div> 
        
        <div>
            <label for="start_date">{{ __('Start Date of Your Study Abroad') }}</label>
            <input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{old('start_date')}}" required autofocus />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div> 
        
        <div>
            <label for="end_date">{{ __('End Date of Your Study Abroad') }}</label>
            <input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{old('end_date')}}" required autofocus />
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
