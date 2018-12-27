<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $fillable = [
    	 'urlVideoFr', 'urlVideoEn', 'quoteVideoFr', 'quoteVideoEn', 'legendVideoFr', 'legendVideoEn',
    ];
}
