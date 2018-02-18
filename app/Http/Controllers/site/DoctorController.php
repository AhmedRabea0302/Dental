<?php

namespace App\Http\Controllers\site;

use App\Doctor;
use App\DoctorSocialLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function getIndex(){
        $doctors = Doctor::all();
        return view('site.pages.doctors.index', compact('doctors', 'doctor_links'));
    }
}
