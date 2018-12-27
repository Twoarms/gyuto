<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\Video;
use App\Models\Event;
use App\Models\Paragraph;
use App\Models\Albummusic;


class Imagepage extends Model
{
    protected $table = 'imagepages';

    protected $fillable = ['titleIFr', 'titleIEn', 'legendIFr', 'legendIEn', 'nameImage', 'cover',];


    // many to many relationship with album
    public function albums()
    {
        return $this->belongsToMany('App\Models\Album');
    }

    // one to many relationship
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    // many to many relationship with paragraph
    public function paragraphs()
    {
        return $this->belongsToMany('App\Models\Paragraph');
    }

    // one to many relationship with albummusic
    public function albummusics()
    {
        return $this->hasMany('App\Models\Albummusic');    
    }  
}
