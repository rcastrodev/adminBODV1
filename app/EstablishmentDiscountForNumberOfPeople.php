<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentDiscountForNumberOfPeople extends Model
{
    protected $fillable = ['establishment_id', 'amount_of_people', 'discount'];

    public static function validateIfTheDayExists($request)
    {
    	return self::where('amount_of_people', $request->input('amount_of_people'))
    								->exists(); 
    }
}
