<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'iso'  => 'required|max:50',
            'utc'  => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'iso.required'  => 'ISO requerido',
            'utc.required'  => 'UTC requerido'
        ];
    }
}
