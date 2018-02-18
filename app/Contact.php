<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function getDetails() {
        return $this->hasMany('App\ContactDetail', 'contact_id');
    }
}
