<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    public function getDetails() {
        return $this->hasMany('App\ServiceFeatureDetail', 'feature_id');
    }
}
