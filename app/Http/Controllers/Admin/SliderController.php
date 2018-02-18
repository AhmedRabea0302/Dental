<?php

namespace App\Http\Controllers\admin;

use App\Slider;
use App\SliderDetail;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function getIndex() {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    public function addSlider(Request $request) {
        // dd($request->all());
        $slider = new Slider();

        $rules = [
            'image_name'      => 'required',
            'slider_title_en' => 'required',
            'slider_title_ar' => 'required',
            'slider_desc_en'  => 'required',
            'slider_desc_ar'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required'      => trans('trans.image_name_message'),
            'slider_title_en.required' => trans('trans.slider_title_en_message'),
            'slider_title_ar.required' => trans('trans.slider_title_ar_message'),
            'slider_desc_en.required'  => trans('trans.slider_desc_en_message'),
            'slider_desc_ar.required'  => trans('trans.slider_desc_ar_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/sliders/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $slider->image_name = $file_name;
            $slider->save();
        }

        $slider_details = new SliderDetail();

        $slider_details->insert([
            'slider_id' => $slider->id,
            'title' => $request->slider_title_en,
            'description' => $request->slider_desc_en,
            'lang' => 'en',
        ]);

        $slider_details->insert([
            'slider_id' => $slider->id,
            'title' => $request->slider_title_ar,
            'description' => $request->slider_desc_ar,
            'lang' => 'ar',
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function getUpdateSlider(Request $request) {
        $slider = Slider::find($request->id);
        return view('admin.pages.slider.update_slider', compact('slider'));
    }

    public function postUpdateSlider(Request $request) {
        $slider = Slider::find($request->id);
        
        $rules = [
            'slider_title_en' => 'required',
            'slider_title_ar' => 'required',
            'slider_desc_en'  => 'required',
            'slider_desc_ar'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'slider_title_en.required' => trans('trans.slider_title_en_message'),
            'slider_title_ar.required' => trans('trans.slider_title_ar_message'),
            'slider_desc_en.required'  => trans('trans.slider_desc_en_message'),
            'slider_desc_ar.required'  => trans('trans.slider_desc_ar_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/sliders/';
            @unlink($destination . $slider->image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $slider->image_name = $file_name;
            $slider->save();
        }

        $slider->getDetails()->where(['lang' => 'en'])->update([
            'title' => $request->slider_title_en,
            'description' => $request->slider_desc_en,
        ]);

        $slider->getDetails()->where([ 'lang' => 'ar'])->update([
            'title' => $request->slider_title_ar,
            'description' => $request->slider_desc_ar,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully'];
    }

    public  function getDeleteSlider(Request $request) {
        $slider = Slider::find($request->id);

        $slider->getDetails()->delete();
        $slider->delete();

        @unlink('storage/uploads/sliders/' . $slider->image_name);

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
