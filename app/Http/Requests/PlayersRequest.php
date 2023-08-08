<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'p1' => 'required',
            'p2' => 'required'
        ];
    }
    
    public function messages(): array {
        return [
            'p1.required' => 'Please provide Player 1', 
            'p2.required' => 'Please Provide Player 2'
            ];
    }
}
