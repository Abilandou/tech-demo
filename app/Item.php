<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'items';
    protected $fillable = [
        'name', 'description', 'url',
        'avatar', 'item_category_id'
    ];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }

    public function attributes()
    {
        return $this->hasMany(ItemAttribute::class, 'item_id');
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class, 'item_id');
    }

}
