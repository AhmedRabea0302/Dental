<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public function getDetails() {
        return $this->hasMany('App\AboutDetail', 'about_id');
    }
}
