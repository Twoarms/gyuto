<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Music extends Model
{
	protected $table = 'musics';

    protected $fillable = [
    	'urlVideoMusic', 'legendMFr', 'legendMEn', 'titleMFr', 'titleMEn', 'textMFr', 'textMEn', 'titleAlbum', 'urlAlbumMusicCdeFr', 'urlAlbumMusicCdeEn'
    ];

    public function imagepages()
    {
        return $this->belongsToMany('App\Models\Imagepage');
        // return $this->belongsToMany('App\Models\Imagepage', 'album_imagepage', 'album_id', 'imagepage_id');
        // return $this->belongsToMany('Imagepage::class', 'album_imagepage', 'album_id', 'imagepage_id');
    }
}
