<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = ['user_id','brand_id','status','type_id','country_id','region_id','city_id','zone_id','name','owner_name','address','latitude','length','phone','reservation_email','logo','main_image','publish_on_the_web','admit_reservation','linear_discount','description','menu'];

    public static function validateInputBoolean($request, $name)
    {
        return ($request->has($name)) ? true : false;
    }
}
