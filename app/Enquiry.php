<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    protected $table = "enquiries";
    protected $fillable = [
        'name', 'email', 'telephone', 'message', 'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
