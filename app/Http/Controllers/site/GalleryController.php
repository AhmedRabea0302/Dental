<?php

namespace App\Http\Controllers\site;


use App\Category;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function getIndex() {
        $categories = Category::get();
        $gallery = Gallery::get();

        return view('site.pages.gallery.index' ,compact('categories' ,'gallery'));
    }
}
