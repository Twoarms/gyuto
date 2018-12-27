<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;

class Album extends Model
{
	protected $table = 'albums';

    protected $fillable = [
    	'titleFr', 'titleEn',
    ];

    public function imagepages()
    {
        return $this->belongsToMany('App\Models\Imagepage');
    }
}
