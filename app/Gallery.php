<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    public function category(){
        return $this->belongsTo('App\Category' ,'cate_id');
    }
}
