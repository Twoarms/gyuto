<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Info;
use App\Models\Imagepage;

class Paragraph extends Model
{
	protected $table = 'paragraphs';

	protected $fillable = [
    	'titleParFr', 'titleParEn','textParFr', 'textParEn',
    ];

    // one to many relations with info
    public function info()
    {
    	return $this->belongsTo('App\Models\Info');        
    }

    // many to many relations with imagepage
    public function imagepages()
    {
        return $this->belongsToMany('App\Models\Imagepage');
    }
}