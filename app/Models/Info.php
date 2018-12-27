<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paragraph;

class Info extends Model
{
    protected $table = 'infos';

    protected $fillable = [
    	 'index_title','titleInFr', 'titleInEn',
    ];

    // relation child parent
    public function parent()
    {
        return $this->belongsTo('App\Models\Info','parent_id')->whereNull('parent_id');
    }

    // relation child parent
    public function children()
    {
    	return $this->hasMany('App\Models\Info','parent_id', 'id');
    }

    // one to many relationship with paragraph
    public function paragraphs()
    {
        return $this->hasMany('App\Models\Paragraph');        
    }
}