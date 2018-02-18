<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function details() {
        return $this->hasMany('App\CategoryDetail', 'cat_id');
    }

    public function translate(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    public function getGallery() {
        return $this->hasMany('App\Gallery', 'cate_id');
    }
}
