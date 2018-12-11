<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Album extends Model
{
	protected $table = 'albums';
    // protected $fillable = [
    // 	'titleFr', 'titleEn', 'galery', 'legendFr', 'legendEn', 'featuredImage', 

    // ];

     protected $fillable = [
    	'titleFr', 'titleEn',
    ];

    public function imagepages()
    {
        return $this->belongsToMany('App\Models\Imagepage');
        // return $this->belongsToMany('App\Models\Imagepage', 'album_imagepage', 'album_id', 'imagepage_id');
        // return $this->belongsToMany('Imagepage::class', 'album_imagepage', 'album_id', 'imagepage_id');
    }
}
