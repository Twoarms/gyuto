<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'titleFr', 'titleEn', 'galery', 'legendFr', 'legendEn', 'cover', 'urlImage', 

    ];
}
