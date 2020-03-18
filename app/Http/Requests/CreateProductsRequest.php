<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductsRequest extends FormRequest
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
        'nombre' => 'required',
        'tipo_producto_id' => 'required',
        'description' => 'required',
        'estatus' => 'required',
        'establecimiento' => 'required',
        'imagen_principal' => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
        'logo' => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
        'gallery' => 'required|array',
        'gallery.*' => "required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080",
        'inventario' => 'required|array',
      ];
    }

    public function messages()
    {
        return [
          'nombre.required' => 'Nombre requerido',
          'tipo_producto_id.required' => 'Tipo requerido',
          'description.required' => 'Descripción requerido',
          'estatus.required' => 'Estatus requerido',
          'establecimiento.required' => 'Establecimiento requerido',
          'imagen_principal.required' => 'Imagen Principal requerido',
          'imagen_principal.mimes' => 'Solo se pueden subir imágenes con formato jpg, png, jpeg',
          'imagen_principal.dimensions' => 'La Imágen Principal debe ser de 1080x1080',
          'logo.required' => 'Logo requerido',
          'logo.mimes' => 'Solo se pueden subir imágenes con formato jpg, png, jpeg',
          'logo.dimensions' => 'El logo debe ser mayor ha 1080x1080',
          'gallery.required' => 'Una imagen en galeria requerido',
          'gallery.mimes' => 'En galeria Solo se pueden subir imágenes con formato jpg, png, jpeg',
          'gallery.dimensions' => 'Imagen de galeria debe ser mayor ha 1080x1080',
          'inventario.required' => 'Inventario requerido',
        ];
    }
}
