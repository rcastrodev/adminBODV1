<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBasicDataOfStablishmentsRequests extends FormRequest
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
            'user_id'       => 'required|numeric',
            'brand_id'      => 'required|numeric',
            'type_id'       => 'required|numeric',
            'country_id'    => 'required|numeric',
            'region_id'     => 'required|numeric',
            'city_id'       => 'required|numeric',
            'zone_id'       => 'required|numeric',
            'name'          => 'required',
            'owner_name'    => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric',
            'reservation_email' => 'required|email',
            'rif' => 'required',
            'logo'          => 'mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
            'main_image'    => 'mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nombre es requerido',
            'brand_id.required' => 'Franquicia requerida',
            'address.required'  => 'Dirección requerido',
            'phone.required'    => 'Teléfono requerido',
            'reservation_email.required' => 'Email para reservación requerido',
            'logo.dimensions'   => '¡Imagen del logo debe poseer medidas de 1080 x 1080 Px!',
            'logo.mimes'         => '¡Solo se admiten imágenes con extensión JPG o JPEG!',
            'main_image.dimensions' => '¡Imagen principal debe poseer medidas de 1080 x 1080 Px!',
            'main_image.mimes'      => '¡Solo se admiten imágenes con extensión JPG o JPEG!',
            'rif.required' => 'El rif es requerido'
        ];
    }
}
