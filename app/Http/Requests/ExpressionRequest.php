<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpressionRequest extends FormRequest
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
            'expression.vocabulary' => 'required|string|max:200',
            'expression.meaning' => 'required|string|max:1000',
            'expression.example' => 'required|string|max:1000',
            'expression.is_private',
        ];
    }
    
    public function messages()
    {
        return [
            'expression.vocabulary.required' => 'You are required to put something',
            'expression.meaning.required' => 'You are required to put something',
            'expression.example.required' => 'You are required to put something'
        ];
    
    }
}
