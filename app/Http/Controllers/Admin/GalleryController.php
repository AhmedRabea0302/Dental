<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class GalleryController extends Controller
{
    public function getIndex() {
        $categories = Category::all();
        $gallery    = Gallery::all();

        return view('admin.pages.gallery.index', compact('categories', 'gallery'));
    }

    public function postAddGallery(Request $request) {
        $gallery = new Gallery();

        $rules = [
            'image_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required' => trans('trans.image_name_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/gallery/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $gallery->image_name = $file_name;
        }

        $gallery->cate_id = $request->gallery_category;
        $gallery->save();

        return ['status' => 'success', 'data' => 'Added Successfully', 'id' => 'warna'];
    }

    public function postUpdateGallery(Request $request) {
        $gallery  = Gallery::find($request->id);

        // dd($request->all());

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/gallery/';
            @unlink($destination . $gallery->image_name);
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $gallery->image_name = $file_name;
        }

        $gallery->cate_id = $request->cate_id;

        $gallery->save();

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];

    }

    public function postDeleteGallery(Request $request) {
        $gallery = Gallery::find($request->id);

        $gallery->delete();
        return redirect()->back()->withC('success')->withM('Deleted Successfully');

    }
}
