<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
    	'name',
    	'code',
    	'city_id'
    ];
}
