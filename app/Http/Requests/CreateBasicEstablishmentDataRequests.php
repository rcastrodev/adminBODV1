<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBasicEstablishmentDataRequests extends FormRequest
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
            'logo'          => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080|max:500000',
            'main_image'    => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080|max:500000',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nombre es requerido',
            'address.required'      => 'Dirección requerido',
            'phone.required'        => 'Teléfono requerido',
            'reservation_email.required' => 'Email para reservación requerido',
            'logo.required'         => 'Logo es requerido',
            'logo.dimensions'       => '¡Imagen del logo debe poseer medidas de 1080 x 1080 Px!',
            'logo.mimes'            => '¡Solo se admiten imágenes con extensión JPG o JPEG!',
            'logo.max'              => '¡Imagen debe pesar menos de 500 KB!',
            'main_image.required'   => 'La imágen principal es requerida',
            'main_image.dimensions' => '¡Imagen principal debe poseer medidas de 1080 x 1080 Px!',
            'main_image.mimes'      => '¡Solo se admiten imágenes con extensión JPG o JPEG!',
            'main_image.max'        => '¡Imagen debe pesar menos de 500 KB!',
            'rif.required'          => 'El rif es requerido',
            'type_id.required'      => 'Tipo de gastronomía requerido',
        ];
    }
}
