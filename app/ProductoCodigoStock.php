<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoCodigoStock extends Model
{
	protected $table = 'producto_codigo_stock';

    protected $fillable = ['producto_id', 'estatus', 'localizador'];
    
}
