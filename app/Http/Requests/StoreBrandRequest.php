<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|max:40',
        ];
    }
    public function messages(): array
    {
        return [
           
            'name.required' => 'Il campo nome è obbligatorio',
            'name.max' => 'Il campo nome non può contenere più  di 40 caratteri',
          
        ];
    }
}
