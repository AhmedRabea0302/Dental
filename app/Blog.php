<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['image_name'];

    public function getDetails() {
        return $this->hasMany('App\BlogDetail', 'blog_id');
    }

    public function translate(){
        return $this->getDetails()->where('lang' ,app()->getLocale())->first();
    }

    public function user(){
        return $this->belongsTo('App\User' ,'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'blog_id');
    }
}

