<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = "blogs";
    protected $fillable = [
        'title', 'description', 'avatar',
        'url', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
