<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $table = 'types';

    protected $fillable = ['name','category'];
}
