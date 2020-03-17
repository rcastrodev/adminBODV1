<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'producto_padre',
      'tipo_producto_id',
      'country_id',
      'region_id',
      'city_id',
      'zone_id',
      'coin_id',
      'estatus',
      'description',
      'nombre',
      'logo',
      'imagen_principal',
      'publicado_web',
      'coin_publico_id',
    	'publico_precio',
      'publico_gratis',
      'public_na',
      'coin_afiliado_id',
    	'afiliado_precio',
      'afiliado_gratis',
      'afiliado_na',
      'fecha_producto'
    ];
}
