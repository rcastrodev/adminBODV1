<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentForks extends Model
{
    protected $fillable = ['establishment_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];


    public static function getEstablishmentForkOCreateObject($id)
    {
    	if (self::find($id)) {
    		return self::find($id);
    	} else {
    		return new EstablishmentForks;
    	}
    	
    }	
}
