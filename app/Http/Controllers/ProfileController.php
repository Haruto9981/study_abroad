<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Cloudinary;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        
        $input_profile = $request['profile'];
        $profile = $request->user()->profile;
        
        if($request->file('profile_image')) {
            
             $profile_image_url = Cloudinary::upload($request->file('profile_image')->getRealPath())->getSecurePath();
             $input_profile += ['profile_image_url' => $profile_image_url];
        }
       
       
        $profile->fill($input_profile)->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function show(User $user)
    {
        return view("profile.show")->with(['user' => $user]);
    }
    
    public function map(User $user)
    {
        return view("profile.map")->with(['user' => $user]);
    }
}
