<?php

namespace App\Http\Controllers\site;
use App\Slider;
use App\About;
use App\StaticPage;
use App\Service;
use App\Doctor;
use App\Subscribe;
use App\Testimonial;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class HomeController extends Controller
{
    public function getIndex() {
        $sliders = Slider::all();
        $about   = About::first();
        $static  = StaticPage::all();
        $services = Service::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        return view('site.pages.home.index', compact('sliders', 'about', 'static', 'services', 'doctors', 'testimonials'));
    }

    public function postSendMessage(Request $request) {
        $message =  new Message();

        $rules = [
            'fname' => 'required',
            'lname'   => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'fname.required'   => 'please enter your first name',
            'lname.required'   => 'please enter your first name',
            'email.required'   => 'please enter your first name',
            'phone.required'   => 'please enter your first name',
            'message.required' => 'please enter your first name',
        ]);

        if($validator->fails()) {
            return ['status' => 'error', 'data' => implode('<br />', $validator->errors()->all()), 'id' => 'warna'];
        }

        $message->insert([
            'fname'   => $request->fname,
            'lname'   => $request->lname,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ]);

        return ['status' => 'success', 'data' => 'لقد وصلتنا رسالتك :)', 'id' => 'warna'];

    }

    public function postSubscribe(Request $request) {
        $subscribe =  new Subscribe();

        $rules = [
            'email' => 'required|email|unique:subscribes',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'email.required'   => 'please enter your email',
            'email.email'      => 'please enter A valid email',
            'email.unique'     => 'This Email already Exists',
        ]);

        if($validator->fails()) {
            return ['status' => 'error', 'data' => implode('<br />', $validator->errors()->all()), 'id' => 'warna'];
        }

        $subscribe->insert([
            'email'   => $request->email,
        ]);

        return ['status' => 'success', 'data' => 'سعيدون لمشاركتك :)', 'id' => 'warna'];
    }
}
