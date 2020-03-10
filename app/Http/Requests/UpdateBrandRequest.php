<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
        
        $rules = [
            'name' => 'required',
            'rif' => 'required|unique:brands',
            'tel' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'address' => 'required',
        ];

        if ($request->hasFile('logo')) {
           $rules['logo'] = 'dimensions:min_width=1080, min_height=1080' 
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'rif.required' => 'Rif requerido',
            'rif.unique' => 'Rif debe ser unico',
            'tel.required' => 'Teléfono requerido',
            'contact_person.required' => 'Persona de contacto requerido',
            'email.required' => 'Email requerido',
            'address.required' => 'Dirección requerida',
            'logo.dimensions' => 'Imágen debe tener dimensiones de al menos 1080x1080'
        ];
    }
}
