<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Video extends Model
{
    protected $fillable = [
        'titleVFr', 'titleVEn', 'category', 'citationVFr', 'citationVEn', 'legendVFr', 'legendVEn', 'urlVideo'];

    // one to many relations
    public function imagepage()
    {
    	// return $this->morphToMany(Imagepage::class, 'imagepageable');
    	return $this->belongsTo('App\Models\Imagepage');
    }

    // public function imagepages()
    // {
    // 	// return $this->morphToMany(Imagepage::class, 'imagepageable');
    // 	return $this->morphMany('App\Models\Imagepage', 'imagepageable');
    // }
}
