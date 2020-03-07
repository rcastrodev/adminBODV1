<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = ['name', 'rif', 'tel', 'contact_person', 'email', 'address', 'logo', 'status'];
}
