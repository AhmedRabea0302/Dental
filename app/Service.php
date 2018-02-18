<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getDetails() {
        return $this->hasMany('App\ServiceDetail', 'service_id');
    }
}
