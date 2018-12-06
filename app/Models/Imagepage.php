<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class Imagepage extends Model
{
    protected $table = 'imagepages';

    protected $fillable = ['titleIFr', 'titleIEn', 'legendIFr', 'legendIEn', 'nameImage'];

    public function albums()
    {
    	return $this->belongsToMany('App\Models\Album');
    	// return $this->belongsToMany('App\Models\Album', 'album_imagepage', 'imagepage_id', 'album_id');
    	// return $this->belongsToMany('Album::class', 'album_imagepage', 'imagepage_id', 'album_id');
    }
}
