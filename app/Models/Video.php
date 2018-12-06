<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'titleFr', 'titleEn', 'category', 'citationFr', 'citationEn', 'legendFr', 'legendEn', 'gif', 'urlVideo', 
    ];
}
