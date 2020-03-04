<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    //
    protected $table = "sub_services";

    protected $fillable = [
        'name', 'description', 'avatar', 'url', 'service_id'
    ];

    public function mainService(){
        return $this->belongsTo(Service::class, 'service_id');
    }
}
