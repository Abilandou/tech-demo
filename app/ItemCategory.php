<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    //
    protected $table = "item_categories";
    protected $fillable = [
        'name', 'description'
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'item_category_id');
    }

}
