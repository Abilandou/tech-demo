<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "members";

    protected $fillable = [
        'name', 'description', 'position',
        'url', 'avatar', 'twitter', 'youtube', 'facebook'
    ];
}
