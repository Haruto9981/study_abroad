<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'profile.region' => ['required', 'string', 'max:30'],
            'profile.start_date' => ['required','date'],
            'profile.end_date' => ['required','date', 'after:profile.start_date'],
            'profile.bio'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'You are required to put something',
            'email.required' => 'You are required to put something',
            'profile.region.required' => 'You are required to put something',
            'profile.start_date.required' => 'You are required to put something',
            'profile.end_date.required' => 'You are required to put something',
        ];
    }
}
