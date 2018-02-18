<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function getDetails() {
        return $this->hasMany('App\SliderDetail', 'slider_id');
    }

    public function translated()
    {
    	return $this->getDetails()->where('lang' ,app()->getLocale())->first();
    }
}
