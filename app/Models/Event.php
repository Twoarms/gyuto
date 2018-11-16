<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   	protected $fillable = [
    	'title', 'dateFrom', 'dateEnd', 'timeStart', 'timeEnd', 'numberStreet', 'nameStreet', 'zipCode','city', 'country', 'descriptionFr', 'descriptionEn',

    ];
}
