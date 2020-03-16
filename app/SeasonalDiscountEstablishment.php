<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonalDiscountEstablishment extends Model
{
    protected $fillable = ['establishment_id', 'time_since', 'time_until', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

}
