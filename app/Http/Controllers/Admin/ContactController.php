<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\ContactDetail;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Mail;

use SMKFontAwesome\SMKFontAwesome;
use Validator;

class ContactController extends Controller
{
    public function getIndex() {
        $messages = Message::all();
        $icons    = SMKFontAwesome::getArray();
        $contact_info = Contact::all();
        return view('admin.pages.contacts.index', compact('messages', 'icons', 'contact_info'));
    }

    public function getReply(Request $request) {
        $message = Message::find($request->id);
        return view('admin.pages.contacts.replyTemplate', compact('message'));
    }

    public function postReply(Request $request) {

        $user_mail = $request->user_email;
        $reply     = $request->message;

        $rules = [
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        Mail::send('admin.pages.contacts.replyMessageDraft', ['user_mail'  => $user_mail, 'reply' => $reply],
            function($message) use ($user_mail, $reply) {
                $message->from('arabea169@gmail.com', 'Rosys');
                $message->to($user_mail)->subject('Dental Bemassey');
            });

        return ['status' => 'success', 'data' => 'Message Sent Successfully', 'id' => 'warna'];
    }

    public function deleteMessage(Request $request) {
        $message = Message::find($request->id);
        $message->delete();

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }

    public function postAddContact(Request $request) {
        $info = new Contact();
        $rules = [
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
            'desc4' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc1.requires' => 'Please Enter A Title In English',
            'desc2.requires' => 'Please Enter A Title In Arabic',
            'desc3.requires' => 'Please Enter A Value In English',
            'desc4.requires' => 'Please Enter A Value In Arabic',
        ]);

        if ($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }
        $info->icon = $request->font_class;
        $info->save();

        $info_details = new ContactDetail();

        $info_details->insert([
            'contact_id'  => $info->id,
            'title' => $request->desc1,
            'description'       => $request->desc3,
            'lang'        => 'en'
        ]);

        $info_details->insert([
            'contact_id'  => $info->id,
            'title'       => $request->desc2,
            'description' => $request->desc4,
            'lang'        => 'ar'
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    }

    public function getUpdateContact(Request $request) {
        $info = Contact::find($request->id);
        $icons = SMKFontAwesome::getArray();
        return view('admin.pages.contacts.updateContactInfo', compact('icons', 'info'));
    }

    public function postUpdateContact(Request $request) {
        $info = Contact::find($request->id);

        $rules = [
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
            'desc4' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc1.requires' => 'Please Enter A Title In English',
            'desc2.requires' => 'Please Enter A Title In Arabic',
            'desc3.requires' => 'Please Enter A Value In English',
            'desc4.requires' => 'Please Enter A Value In Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $info->icon = $request->font_class;
        $info->save();

        $info->getDetails()->where(['contact_id' => $info->id,'lang' => 'en'])->update([
            'title'       => $request->desc1,
            'description' => $request->desc3,
        ]);

        $info->getDetails()->where(['contact_id' => $info->id,'lang' => 'ar'])->update([
            'title'       => $request->desc2,
            'description' => $request->desc4,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    }

    public function postDeleteContact(Request $request) {
        $contact_info = Contact::find($request->id);

        $contact_info->getDetails()->delete();
        $contact_info->delete();

        return back()->withC('success')->withM('Deleted Successfully');
    }
}
