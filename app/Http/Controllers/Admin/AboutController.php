<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getIndex() {
        $about = About::first();
        return view('admin.pages.about.index', compact('about'));
    }

    public function postUpdateAbout(Request $request) {
        $about = About::first();

        $rules = [
            'desc1' => 'required',
            'desc2' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'desc1.required' => 'من فضلك ادخل محنوى صفحة من نحن',
            'desc2.required' => 'من فضلك ادخل محنوى صفحة من نحن'
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/about/';
            @unlink($destination . $about->image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $about->image_name = $file_name;
            $about->save();
        }

        $about->getDetails()->where(['lang' => 'en'])->update([
            'content' => $request->desc1
        ]);

        $about->getDetails()->where(['lang' => 'ar'])->update([
            'content' => $request->desc2
        ]);

        $about->save();

        return ['status' => 'success', 'data' => 'Updated Successfully'];

    }
}
