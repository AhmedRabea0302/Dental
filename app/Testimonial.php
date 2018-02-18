<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public function getDetails() {
        return $this->hasMany('App\TestimonialDetail', 'test_id');
    }
}
