<?php

namespace App\Http\Controllers\site;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class ReserveController extends Controller
{
    public function getIndex() {
        return view('site.pages.reserve.index');
    }

    public function postReserve(Request $request) {
        $reserve =  new Reservation();

        $rules = [
            'full_name' => 'required',
            'type'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'date'      => 'required',
            'period'    => 'required',
            'message'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'full_name.required' => 'please enter your Full name',
            'type.required'      => 'please enter your Gender',
            'email.required'     => 'please enter your email',
            'email.url'          => 'please enter a Valid email',
            'phone.required'     => 'please enter your Phone Number',
            'period.required'    => 'please enter your Reservation Period',
            'message.required'   => 'please enter your message',
        ]);

        if($validator->fails()) {
            return ['status' => 'error', 'data' => implode('<br />', $validator->errors()->all()), 'id' => 'warna'];
        }


        $reserve->insert([
            'name'    => $request->full_name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'gender'  => $request->type,
            'time'    => $request->date,
            'period'  => $request->period,
            'message' => $request->message,
        ]);

        return ['status' => 'success', 'data' => 'لقد وصلتنا رسالتك وسيتم ابلاغك بمعاد الحجز :)', 'id' => 'warna'];
    }
}
