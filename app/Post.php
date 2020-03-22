<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RomegaDigital\Multitenancy\Traits\BelongsToTenant;

class Post extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        "title",
        "body"
    ];
}
