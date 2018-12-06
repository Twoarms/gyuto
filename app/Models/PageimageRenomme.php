<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pageimage extends Model
{
	// protected $table = 'albums';
    // protected $fillable = [
    // 	'titleFr', 'titleEn', 'galery', 'legendFr', 'legendEn', 'featuredImage', 

    // ];

     protected $fillable = [
    	'titleFr', 'titleEn', 

    ];

    public function imagepages()
    {
    	// return $this->hasMany('App\')
    }
}
