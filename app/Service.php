<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "services";

    protected $fillable = [
        'name', 'description', 'avatar', 'url'
    ];

    public function subServices(){
        return $this->hasMany(SubService::class, 'service_id');
    }
    
}
