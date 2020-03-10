<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandsRequest extends FormRequest
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
            'name' => 'required|max:255',
            'rif' => 'required|unique:brands|max:255',
            'tel' => 'required|max:50',
            'contact_person' => 'required|max:255',
            'email' => 'required|max:100|unique:brands',
            'address' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'name.max'      => 'Nombre no puede tener mas de 255 caracteres',
            'rif.required'  => 'Rif requerido',
            'rif.unique'    => 'El número de rif ya esta registrado',
            'rif.max'       => 'El número de rif no puede pasar los 50 caracteres',
            'tel.required'  => 'Teléfono requerido',
            'tel.max'       => 'Teléfono requerido',
            'contact_person.required' => 'Persona de contanto requerido',
            'contact_person.max'    => 'El campo persona no puede tener mas de 255 caracteres',
            'email.required'        => 'Email requerido',
            'email.unique'        => 'Email ya esta registrado',
            'address.required' => 'Dirección requerida',
            'logo.required' => 'Logo requerido',
            'logo.mimes' => 'Solo se pueden subir imágenes con formato jpg, png, jpeg',
            'logo.dimensions' => 'La imágen de ser mayor ha 1080x1080',
        ];
    }
}
