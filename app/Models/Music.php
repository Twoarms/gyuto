<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Albummusic;

class Music extends Model
{
    protected $table = 'musics';

    protected $fillable = [
    	'urlMusic', 'titleMusic', 'durationMusic',
    ];

    // many to many relationship with albummusic
    public function albummusics()
    {
        return $this->belongsToMany('App\Models\Albummusic');    	
    }
}
