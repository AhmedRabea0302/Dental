<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use App\TestimonialDetail;
use Illuminate\Http\Request;
use Validator;

class TestimonialController extends Controller
{
    public function getIndex() {
        $testimonials = Testimonial::all();
        return view('admin.pages.testimonials.index', compact('testimonials'));
    }

    public function postAddTestimonial(Request $request) {
        $testimonial = new Testimonial();

        $rules = [
            'image_name'      => 'required',
            'test_name_en'    => 'required',
            'test_name_ar'    => 'required',
            'test_address_en' => 'required',
            'test_address_ar' => 'required',
            'test_desc_en'    => 'required',
            'test_desc_ar'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required'       => trans('trans.image_name_message'),
            'test_name_en.required'     => trans('trans.slider_title_en_message'),
            'test_name_ar.required'     => trans('trans.slider_title_ar_message'),
            'test_address_en.required'  => trans('trans.slider_desc_en_message'),
            'test_address_ar.required'  => trans('trans.slider_desc_ar_message'),
            'test_desc_en.required'     => trans('trans.slider_desc_ar_message'),
            'test_desc_ar.required'     => trans('trans.slider_desc_ar_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/testimonials/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $testimonial->image_name = $file_name;
            $testimonial->save();
        }

        $testimonial_details = new TestimonialDetail();

        $testimonial_details->insert([
            'test_id'     => $testimonial->id,
            'name'        => $request->test_name_en,
            'address'     => $request->test_address_en,
            'description' => $request->test_desc_en,
            'lang'        => 'en',
        ]);

        $testimonial_details->insert([
            'test_id'     => $testimonial->id,
            'name'        => $request->test_name_ar,
            'address'     => $request->test_address_ar,
            'description' => $request->test_desc_ar,
            'lang'        => 'ar',
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function getTestimonial(Request $request) {
        $testimonial = Testimonial::find($request->id);

        return view('admin.pages.testimonials.update_testimonial', compact('testimonial'));
    }

    public function postUpdateTestimonial(Request $request) {
        $testimonial =  Testimonial::find($request->id);

        $rules = [
            'test_name_en'    => 'required',
            'test_name_ar'    => 'required',
            'test_address_en' => 'required',
            'test_address_ar' => 'required',
            'test_desc_en'    => 'required',
            'test_desc_ar'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'test_name_en.required'     => trans('trans.slider_title_en_message'),
            'test_name_ar.required'     => trans('trans.slider_title_ar_message'),
            'test_address_en.required'  => trans('trans.slider_desc_en_message'),
            'test_address_ar.required'  => trans('trans.slider_desc_ar_message'),
            'test_desc_en.required'     => trans('trans.slider_desc_ar_message'),
            'test_desc_ar.required'     => trans('trans.slider_desc_ar_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/testimonials/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $testimonial->image_name = $file_name;
            $testimonial->save();
        }

        $testimonial->getDetails()->where(['lang' => 'en', 'test_id' => $testimonial->id])->update([
            'name'        => $request->test_name_en,
            'address'     => $request->test_address_en,
            'description' => $request->test_desc_en,
        ]);

        $testimonial->getDetails()->where(['lang' => 'ar', 'test_id' => $testimonial->id])->update([
            'name'        => $request->test_name_ar,
            'address'     => $request->test_address_ar,
            'description' => $request->test_desc_ar,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    }

    public function getDeleteTestimonial(Request $request) {
        $testimonial = Testimonial::find($request->id);

        $testimonial->getDetails()->delete();
        $testimonial->delete();

        @unlink('storage/uploads/sliders/' . $testimonial->image_name);

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
