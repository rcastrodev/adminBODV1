<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoEstablishment extends Model
{
    protected $table = 'producto_establishment';

    protected $fillable = ['product_id', 'establishment_id'];
}
