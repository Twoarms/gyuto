<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Event extends Model
{
   	protected $fillable = [
    	'title', 'datestart', 'dateend', 'hourstart', 'hourend', 'place','number', 'street', 'zipcode','city', 'country', 'descriptionfr', 'descriptionen',

    ];

    protected $casts = [
    'datestart' => 'datetime:d/m/Y',
    'dateend' => 'datetime:d/m/Y',
	];

    public function imagepage()
    {
     	return $this->belongsTo('App\Models\Imagepage');
    }
}

