<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    public function club()
    {
        return $this->belongsTo('App\Club');
    }
}
