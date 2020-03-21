<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoGallery extends Model
{
    protected $table = 'producto_gallery';

    protected $fillable = ['product_id', 'nombre', 'ruta', 'orden'];
}
