<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceDetail;
use Illuminate\Http\Request;

use Validator;

class ServiceController extends Controller
{
    public function getIndex() {
        $services = Service::all();
        return view('admin.pages.services.index', compact('services'));
    }

    public function postAddService(Request $request) {
        $service = new Service();

        $rules = [
            'service_image_name' => 'required',
            'icon_image_name'    => 'required',
            'service_title_ar'   => 'required',
            'service_title_en'   => 'required',
            'service_desc1_ar'   => 'required',
            'service_desc1_en'   => 'required',
            'service_desc2_ar'   => 'required',
            'service_desc2_en'   => 'required',
            'keywords_ar'        => 'required',
            'keywords_en'        => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'service_image_name.required' => trans('trans.icon_image_name_message'),
            'icon_image_name.required'    => trans('trans.icon_image_name_message'),
            'service_title_ar.required'   => trans('trans.service_title_ar_message'),
            'service_title_en.required'   => trans('trans.service_title_en_message'),
            'service_desc1_ar.required'   => trans('trans.service_desc1_ar_message'),
            'service_desc1_en.required'   => trans('trans.service_desc1_en_message'),
            'service_desc2_ar.required'   => trans('trans.service_desc2_ar_message'),
            'service_desc2_en.required'   => trans('trans.service_desc2_en_message'),
            'keywords_ar.required'        => trans('trans.keywords_message'),
            'keywords_en.required'        => trans('trans.keywords_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('service_image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/services/';
            $file_name = time().$file->getClientOriginalName().time();
            $file->move($destination, $file_name);
            $service->service_image_name = $file_name;
        }

        $file2 = $request->file('icon_image_name');
        if(!empty($file2)) {
            $destination = 'storage/uploads/services/';
            $file_name = $file2->getClientOriginalName().time();
            $file2->move($destination, $file_name);
            $service->icon_image_name = $file_name;
        }

        $slug = preg_replace('/\s+/', '-', $request->service_title_en);

        $service->slug = $slug;
        $service->link = $request->link;

        $service->save();

        $service_details = new ServiceDetail();

        $service_details->insert([
            'service_id' => $service->id,
            'keywords'   => $request->keywords_en,
            'features'   => $request->features_en,
            'name'       => $request->service_title_en,
            'desc1'      => $request->service_desc1_en,
            'desc2'      => $request->service_desc2_en,
            'lang'       => 'en',
        ]);

        $service_details->insert([
            'service_id' => $service->id,
            'keywords'   => $request->keywords_ar,
            'features'   => $request->features_ar,
            'name'       => $request->service_title_ar,
            'desc1'      => $request->service_desc1_ar,
            'desc2'      => $request->service_desc2_ar,
            'lang'       => 'ar',
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function getService(Request $request) {
        $service = Service::find($request->id);

        return view('admin.pages.services.update_service', compact('service'));
    }

    public function postUpdateService(Request $request) {

        $service = Service::find($request->id);

        $rules = [
            'service_title_ar'   => 'required',
            'service_title_en'   => 'required',
            'service_desc1_ar'   => 'required',
            'service_desc1_en'   => 'required',
            'service_desc2_ar'   => 'required',
            'service_desc2_en'   => 'required',
            'keywords_ar'        => 'required',
            'keywords_en'        => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'service_title_ar.required'   => trans('trans.service_title_ar_message'),
            'service_title_en.required'   => trans('trans.service_title_en_message'),
            'service_desc1_ar.required'   => trans('trans.service_desc1_ar_message'),
            'service_desc1_en.required'   => trans('trans.service_desc1_en_message'),
            'service_desc2_ar.required'   => trans('trans.service_desc2_ar_message'),
            'service_desc2_en.required'   => trans('trans.service_desc2_en_message'),
            'keywords_ar.required'        => trans('trans.keywords_message'),
            'keywords_en.required'        => trans('trans.keywords_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('service_image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/services/';
            @unlink($destination . $service->service_image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $service->service_image_name = $file_name;
        }

        $file2 = $request->file('icon_image_name');
        if(!empty($file2)) {
            $destination = 'storage/uploads/services/';
            @unlink($destination . $service->icon_image_name);
            $file_name = time().$file2->getClientOriginalName();
            $file2->move($destination, $file_name);
            $service->icon_image_name = $file_name;
        }

        $slug = preg_replace('/\s+/', '-', $request->service_title_en);

        $service->slug = $slug;
        $service->link = $request->link;

        $service->save();

        $service->getDetails()->where(['service_id' => $service->id, 'lang' => 'en'])->update([
            'keywords'   => $request->keywords_en,
            'features'   => $request->features_en,
            'name'       => $request->service_title_en,
            'desc1'      => $request->service_desc1_en,
            'desc2'      => $request->service_desc2_en,
        ]);

        $service->getDetails()->where(['service_id' => $service->id, 'lang' => 'ar'])->update([
            'keywords'   => $request->keywords_ar,
            'features'   => $request->features_ar,
            'name'       => $request->service_title_ar,
            'desc1'      => $request->service_desc1_ar,
            'desc2'      => $request->service_desc2_ar,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    }

    public  function getDeleteService(Request $request) {
        $service = Service::find($request->id);

        $service->getDetails()->delete();
        $service->delete();

        @unlink('storage/uploads/services/' . $service->service_image_name);
        @unlink('storage/uploads/services/' . $service->icon_image_name);

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
