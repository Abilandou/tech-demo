<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    //
    protected $table = "item_attributes";
    protected $fillable = [
        'the_image', 'size', 'item_id', 'image_name'
    ];


    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
