<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagepage;
use App\Models\Info;

class Info extends Model
{
    protected $table = 'infos';

    protected $fillable = [
    	 'index_title','titleInFr', 'titleInEn', 'textInFr', 'textInEn',
    ];

    // one to many relations
    public function parent()
    {
    	// return $this->belongsTo(self::class,'parent_id')->where('parent_id', 0)->with('parent');
    	// return $this->belongsTo(self::class,'parent_id')->whereNull('parent_id')->with('parent');
        return $this->belongsTo('App\Models\Info','parent_id')->whereNull('parent_id');
        // return $this->belongsTo('App\Models\Imagepage\Info','parent_id');
    }

    public function children()
    {
    	return $this->hasMany('App\Models\Info','parent_id', 'id');
    }

    public function imagepages()
    {
        return $this->belongsToMany('App\Models\Imagepage');     
    }
}