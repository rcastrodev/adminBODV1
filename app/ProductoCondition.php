<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoCondition extends Model
{
    protected $table = 'product_condition';

    protected $fillable = ['condition_id', 'product_id'];
}
