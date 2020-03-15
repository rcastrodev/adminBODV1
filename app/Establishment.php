<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = ['user_id','brand_id','status','type_id','country_id','region_id','city_id','zone_id','name','owner_name','address','latitude','length','phone','reservation_email','logo','main_image','publish_on_the_web','admit_reservation','linear_discount','description','menu'];

    public static function validateInputBoolean($request, $name)
    {
        return ($request->has($name)) ? true : false;
    }

    public static function deleteIfYouHaveImage($request, $id, $nameFile, $campo)
    {
        //valida si trae un objeto tipo file desde el front
        if( $request->hasFile($nameFile) ){
            // borrar imagen del storage
            Storage::disk('my_img')->delete(self::find($id)->$campo);
            //agregar nueva ruta en la base de datos y gardar el archivo
            return  $request->file($nameFile)->store('establishments', 'my_img');
        }else{
            // si no trae el objeto file se queda con su valor 
            return self::find($id)->$campo;
        }
    }
}
