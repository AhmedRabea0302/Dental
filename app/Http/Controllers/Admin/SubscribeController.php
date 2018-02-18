<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Subscribe;
use Validator;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function getIndex() {
        $subscribers = Subscribe::all();
        return view('admin.pages.subscribe.index', compact('subscribers'));
    }

    public function getReply(Request $request) {
        $email = Subscribe::find($request->id);
        return view('admin.pages.subscribe.replyTemplate', compact('email'));
    }

    public function postReply(Request $request) {

        $user_mail = $request->user_email;
        $reply     = $request->message;

        $rules = [
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'message.required' => 'please enter your message'
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        Mail::send('admin.pages.subscribe.replyMessageDraft', ['user_mail'  => $user_mail, 'reply' => $reply],
            function($message) use ($user_mail, $reply) {
                $message->from('arabea169@gmail.com', 'Rosys');
                $message->to($user_mail)->subject('Dental Bemassey');
            });

        return ['status' => 'success', 'data' => 'Message Sent Successfully', 'id' => 'warna'];
    }

    public function getDelete(Request $request) {
        $subcriber = Subscribe::find($request->id);
        $subcriber->delete();

        return back()->withC('success')->withM('Deleted Successfully');
    }
}
