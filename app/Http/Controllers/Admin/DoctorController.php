<?php

namespace App\Http\Controllers\admin;

use App\Doctor;
use App\DoctorDetail;
use App\DoctorSocialLink;
use App\Http\Controllers\Controller;
use SMKFontAwesome\SMKFontAwesome;
use Validator;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function getIndex() {
        $icons = SMKFontAwesome::getArray();
        $doctors = Doctor::all();
        return view('admin.pages.doctors.index', compact('icons', 'doctors'));
    }

    public function addDoctor(Request $request) {
        $doctor = new Doctor();
        $doctor_details = new DoctorDetail();
        $doctor_links   = new DoctorSocialLink();

        $rules = [
            'image_name' => 'required',
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'sector_en'  => 'required',
            'sector_ar'  => 'required',
            'link'       => 'required|url',
            'icon'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required' => 'من فضلك أدخل الصورة',
            'name_en.required'    => 'من فضلك أدخل الإسم بالإنجليزي',
            'name_ar.required'    => ' من من فضلك أدخل الإسم بالعربي',
            'sector_en.required'  => 'من فضلك أدخل عنوان القسم بالإنجليزي',
            'sector_ar.required'  => 'من فضلك أدخل عنوان القسم بالعربي',
            'link.url'            => 'من فضلك أدخل رابط صحيح',
            'icon.required'       => 'من فضلك إختر أيقونة',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/doctors/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $doctor->image_name = $file_name;
            $doctor->save();
        }

        $doctor_details->insert([
            'doctor_id' => $doctor->id,
            'name'      => $request->name_en,
            'job_title' => $request->sector_en,
            'lang'      => 'en',
        ]);

        $doctor_details->insert([
            'doctor_id' => $doctor->id,
            'name'      => $request->name_ar,
            'job_title' => $request->sector_ar,
            'lang'      => 'ar',
        ]);

        $doctor_links->insert([
            'doctor_id' => $doctor->id,
            'icon'     => $request->icon,
            'link'     => $request->link,
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function getUpdateDoctor(Request $request) {
        $doctor = Doctor::find($request->id);
        $icons = SMKFontAwesome::getArray();
        $social_links = DoctorSocialLink::where('doctor_id', $request->id)->get();
        return view('admin.pages.doctors.update_doctor', compact('doctor', 'icons', 'social_links'));
    }

    public function postUpdateDoctor(Request $request) {

        $doctor = Doctor::find($request->id);

        $rules = [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'sector_en'  => 'required',
            'sector_ar'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name_en.required'    => 'من فضلك أدخل الاسم بالإنجليزية',
            'name_ar.required'    => ' من فضلك أدخل الاسم بالعربية',
            'sector_en.required'  => 'من فضلك أدخل اسم القسم بالإنجليزية' ,
            'sector_ar.required'  => ' فضلك أدخل اسم القسم بالعربية' ,
        ]);
        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/doctors/';
            @unlink($destination . $doctor->image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $doctor->image_name = $file_name;
            $doctor->save();
        }

        $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'en'])->update([
            'name'      => $request->name_en,
            'job_title' => $request->sector_en,
        ]);

        $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'ar'])->update([
            'name'      => $request->name_ar,
            'job_title' => $request->sector_ar,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully'];
    }

    public function postAddSocialLink(Request $request) {
        $rules = [
            'link' => 'required|url'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'link.required' => 'من فضلك أدخل رابط لموقع التواصل',
            'link.url' => 'من فضلك أضف رابط صحيح لموقع التواصل',
        ]);

        if ($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $doctor = new DoctorSocialLink();

        $doctor->insert([
            'doctor_id' => $request->id,
            'icon'      => $request->icon,
            'link'      => $request->link,
        ]);

        return ['status' => 'success', 'data' => 'Added Successfully'];
    }

    public function postUpdateSocialLink(Request $request) {
        $rules = [
            'edit_link' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'edit_link.required' => 'من فضلك أدخل رابط لموقع التواصل',
        ]);

        if ($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $doctor = DoctorSocialLink::where(['id' => $request->id])->first();

        $doctor->update([
            'icon'      => $request->edit_icon,
            'link'      => $request->edit_link,
        ]);

        if($doctor->save()) {
            return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
        }
    }

    public function postDeleteSocialLink(Request $request) {
        $doctor = DoctorSocialLink::find($request->id);

        $doctor->delete();
        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }

    public  function getDeleteDoctor(Request $request) {
        $doctor = Doctor::find($request->id);

        $doctor->getDetails()->delete();
        $doctor->getLinks()->delete();
        $doctor->delete();

        @unlink('storage/uploads/doctors/' . $doctor->image_name);

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
