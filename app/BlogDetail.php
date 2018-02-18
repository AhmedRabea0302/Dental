<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    //
    public function blog(){
        return $this->belongsTo('App\Blog' ,'blog_id');
    }

}
