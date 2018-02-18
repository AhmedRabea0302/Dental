<?php

namespace App\Http\Controllers\site;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function getIndex() {
        return view('site.pages.contact.index');
    }
}
