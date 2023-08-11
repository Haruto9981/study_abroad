<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryCommentRequest extends FormRequest
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
            'comment.body' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'comment.body.required' => 'You are required to put something'
        ];
    }
}
