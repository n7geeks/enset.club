<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name', 'email', 'creation_date','logo','description',
    ];


    public function members(){
        return $this->hasMany('App\Users');
    }

    public function articles(){
        return $this->hasMany('App\Article');
    }
}
