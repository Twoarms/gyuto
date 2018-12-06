<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
    	'urlVideoMusic', 'legendFr', 'legendEn', 'titleFr', 'titleEn', 'textFr', 'textEn', 'titleAlbumFr','titleAlbumEn', 'urlAlbumMusic', 'urlMusic', 'titleMusic',

    ];
}
