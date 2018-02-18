<?php

namespace App\Http\Controllers\site;

use App\About;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getIndex(){
        $about   = About::first();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        return view('site.pages.about.index', compact('about', 'doctors', 'testimonials'));
    }
}
