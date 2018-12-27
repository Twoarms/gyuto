<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Video extends Model
{
    protected $fillable = [
        'titleVFr', 'titleVEn', 'category', 'citationVFr', 'citationVEn', 'legendVFr', 'legendVEn', 'urlVideoFr', 'urlVideoEn', 'durationVideo'];

    // one to many relations with imagepage
    public function imagepage()
    {
    	return $this->belongsTo('App\Models\Imagepage');
    }
}
