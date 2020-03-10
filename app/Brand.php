<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'rif', 'tel', 'contact_person', 'email', 'address', 'logo', 'status'];
    
    public static function setStatusAttribute($value)
    {
        return ($value) ? 1 : 0;
    }
}
