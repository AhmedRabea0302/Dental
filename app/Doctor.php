<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    public function getDetails() {
        return $this->hasMany('App\DoctorDetail', 'doctor_id');
    }

    public function getLinks() {
        return $this->hasMany('App\DoctorSocialLink', 'doctor_id');
    }
}
