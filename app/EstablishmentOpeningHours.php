<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentOpeningHours extends Model
{
    protected $fillable = ['establishment_id', 'day', 'time_since', 'time_until'];

    public static function validateIfTheDayExists($request)
    {
    	return EstablishmentOpeningHours::where('establishment_id', $request->input('establishment_id'))->where('day', $request->input('day'))->exists(); 
    }
}
