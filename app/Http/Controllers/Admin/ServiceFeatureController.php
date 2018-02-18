<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\ServiceFeature;
use App\ServiceFeatureDetail;
use Illuminate\Http\Request;

use Validator;

class ServiceFeatureController extends Controller
{
    public function getIndex() {
        $features = ServiceFeature::all();
        return view('admin.pages.services_features.index', compact('features'));
    }

    public function postAddFeature(Request $request) {
        $rules = [
            'image_name'       => 'required',
            'service_title_en' => 'required',
            'service_title_ar' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required'       => 'please Enter The Feature Image',
            'service_title_en.required' => 'please Enter The Feature In English',
            'service_title_ar.required' => 'please Enter The Feature In Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $feature = new ServiceFeature();

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/features/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $feature->image_name = $file_name;
        }

        $feature->save();

        $feature_detail = new ServiceFeatureDetail();

        $feature_detail->insert([
            'feature_id' => $feature->id,
            'title'      => $request-> service_title_en,
            'lang'       => 'en',
        ]);

        $feature_detail->insert([
            'feature_id' => $feature->id,
            'title'      => $request-> service_title_ar,
            'lang'       => 'ar',
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function getUpdateFeature(Request $request) {
        $feature = ServiceFeature::find($request->id);
        return view('admin.pages.services_features.update_feature', compact('feature'));
    }

    public function postUpdateFeature(Request $request) {
        $rules = [
            'service_title_en' => 'required',
            'service_title_ar' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'service_title_en.required' => 'please Enter The Feature In English',
            'service_title_ar.required' => 'please Enter The Feature In Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $feature = ServiceFeature::find($request->id);

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/features/';
            @unlink($destination . $feature->image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $feature->image_name = $file_name;
        }

        $feature->getDetails()->where(['feature_id' => $feature->id, 'lang' => 'en'])->update([
            'title'      => $request-> service_title_en,
        ]);

        $feature->getDetails()->where(['feature_id' => $feature->id, 'lang' => 'ar'])->update([
            'title'      => $request-> service_title_ar,
        ]);

        $feature->save();

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    } 

    public function getDeleteFeature($id) {
        $feature = ServiceFeature::find($id);
        $feature->getDetails()->delete();
        $feature->delete();

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
