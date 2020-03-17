<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
	protected $fillable = [
    	'estatus',
    	'nombre',
    	'cantidadTiempo',
    	'tipoTiempo',
    ];
}