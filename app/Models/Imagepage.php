<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\Video;
use App\Models\Info;
use App\Models\Event;


class Imagepage extends Model
{
    protected $table = 'imagepages';

    protected $fillable = ['titleIFr', 'titleIEn', 'legendIFr', 'legendIEn', 'nameImage', 'cover',];

    public function albums()
    {
        return $this->belongsToMany('App\Models\Album');
    	// return $this->belongsToMany('App\Models\Album', 'album_imagepage', 'imagepage_id', 'album_id');
    	// return $this->belongsToMany('Album::class', 'album_imagepage', 'imagepage_id', 'album_id');
    }

    // // one to many relationship
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    //     return $this->morphedByMany('App\Models\Video', 'imagepageable');
    }

    public function infos()
    {
        return $this->belongsToMany('App\Models\Info');
    }

    public function musics()
    {
        return $this->belongsToMany('App\Models\Music');
        // return $this->belongsToMany('App\Models\Album', 'album_imagepage', 'imagepage_id', 'album_id');
        // return $this->belongsToMany('Album::class', 'album_imagepage', 'imagepage_id', 'album_id');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    //     return $this->morphedByMany('App\Models\Video', 'imagepageable');
    }
    
}
