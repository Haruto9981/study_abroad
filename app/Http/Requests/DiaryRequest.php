<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'diary.title' => 'required|string|max:100',
            'diary.content' => 'required|string|max:4000',
            'diary.photo',
            'diary.is_private'
        ];
    }
    
    public function messages() {
        return [
            'diary.title.required' => 'You are required to put something',
            'diary.content.required' => 'You are required to put something'
        ];
    }
}
