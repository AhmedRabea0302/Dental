<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\StaticPage;
use Illuminate\Http\Request;
use Auth;
use Validator;

class StaticPageController extends Controller
{
    public function getIndex() {
        $statics = StaticPage::all();
        return view('admin.pages.static.index', compact('statics'));
    }

    public function postUpdateClinicService(Request $request) {
        $static_en = StaticPage::where('flag', 'clinic_service_en')->first();
        $static_ar = StaticPage::where('flag', 'clinic_service_ar')->first();

        $rules = [
            'desc1' => 'required',
            'desc2' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc1.required' => 'Please Enter Value in English',
            'desc2.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc1;
        $static_ar->content = $request->desc2;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
    }

    public function postUpdateDoctors(Request $request) {
        $static_en = StaticPage::where('flag', 'doctors_en')->first();
        $static_ar = StaticPage::where('flag', 'doctors_ar')->first();

        $rules = [
            'desc3' => 'required',
            'desc4' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc3.required' => 'Please Enter Value in English',
            'desc4.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc3;
        $static_ar->content = $request->desc4;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
    }

    public function postUpdateSuccess(Request $request) {
        $static_en = StaticPage::where('flag', 'success_en')->first();
        $static_ar = StaticPage::where('flag', 'success_ar')->first();

        $rules = [
            'desc5' => 'required',
            'desc6' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc5.required' => 'Please Enter Value in English',
            'desc6.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc5;
        $static_ar->content = $request->desc6;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
    }

    public function postUpdateContact(Request $request) {
        $static_en = StaticPage::where('flag', 'contact_en')->first();
        $static_ar = StaticPage::where('flag', 'contact_ar')->first();

        $rules = [
            'desc7' => 'required',
            'desc8' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc7.required' => 'Please Enter Value in English',
            'desc8.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc7;
        $static_ar->content = $request->desc8;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
    }

    public function postUpdateLeader(Request $request) {
        $static_en = StaticPage::where('flag', 'leader_en')->first();
        $static_ar = StaticPage::where('flag', 'leader_ar')->first();

        $rules = [
            'desc9' => 'required',
            'desc10' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc9.required' => 'Please Enter Value in English',
            'desc10.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc9;
        $static_ar->content = $request->desc10;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
    }

    public function postUpdateSubscribe(Request $request) {
        $static_en = StaticPage::where('flag', 'subscribe_en')->first();
        $static_ar = StaticPage::where('flag', 'subscribe_ar')->first();

        $rules = [
            'desc11' => 'required',
            'desc12' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc11.required' => 'Please Enter Value in English',
            'desc12.required' => 'Please Enter Value in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $static_en->content = $request->desc11;
        $static_ar->content = $request->desc12;

        if($static_en->save()&&$static_ar->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }

    }
}
