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
            'name' => 'required',
            'rif' => 'required',
            'tel' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'address' => 'required',
            'logo' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'rif.required' => 'Rif requerido',
            'tel.required' => 'Teléfono requerido',
            'contact_person.required' => 'Persona de contanto requerido',
            'email.required' => 'Email requerido',
            'address.required' => 'Dirección requerida',
            'logo.required' => 'Logo requerido',
            'status.required' => 'Estatus requerido',
        ];
    }
}
