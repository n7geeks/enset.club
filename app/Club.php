<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name', 'email', 'creation_date','logo','description',
    ];
}
