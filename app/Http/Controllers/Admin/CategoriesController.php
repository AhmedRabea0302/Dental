<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\CategoryDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SMKFontAwesome\SMKFontAwesome;

use Validator;
class CategoriesController extends Controller
{
    public function getIndex() {
        $category = Category::all();
        $icons = SMKFontAwesome::getArray();
        return view('admin.pages.categories.index', compact('icons', 'category'));
    }

    public function postAddCategory(Request $request) {
        $category = new Category();
        $category_details = new CategoryDetail();

        $rules = [
            'category_name_en'    => 'required',
            'category_name_ar'    => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'category_name_en.required'   => 'من فضلك أضف اسم القسم بالإنجليزيه',
            'category_name_ar.required'   => 'من فضلك أضف اسم القسم بالعربية',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $category->save();

        if ($category->save()){
            $category_details->insert([
                'cat_id'    => $category->id,
                'name'      => $request->category_name_en,
                'lang'      => 'en',
            ]);

            $category_details->insert([
                'cat_id'    => $category->id,
                'name'      => $request->category_name_ar,
                'lang'      => 'ar',
            ]);
        }

        return ['status' => 'success', 'data' => 'Category Added Successfully', 'id' => 'warna'];
    }

    public function postUpdateCategory(Request $request) {
        $category = Category::find($request->id);

        $rules = [
            'name_en'    => 'required',
            'name_ar'    => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name_en.required'   => 'من فضلك أضف اسم القسم بالإنجليزيه',
            'name_ar.required'   => 'من فضلك أضف اسم القسم بالعربية',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $category->details()->where(['cat_id' => $category->id, 'lang' => 'en'])->update([
            'name' => $request->name_en,
        ]);

        $category->details()->where(['cat_id' => $category->id, 'lang' => 'ar'])->update([
            'name' => $request->name_ar,
        ]);

        $category->save();

        return ['status' => 'success', 'data' => 'Category Updated Successfully', 'id' => 'warna'];
    }

    public function postDeleteCategory(Request $request) {
        $category = Category::find($request->id);

        $category->details()->delete();
        $category->delete();

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
