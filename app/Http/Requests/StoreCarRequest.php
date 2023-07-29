<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
         
            'model' => 'required|max:40',
            'price' => 'required'
        ];
    }
    
    public function messages(): array
    {
        return [
           
            'model.required' => 'Il campo modello è obbligatorio',
            'model.max' => 'Il campo modello non può contenere più  di 40 caratteri',
            'price.required' => 'Il campo prezzo è obbligatorio',    
        ];
    }


}
