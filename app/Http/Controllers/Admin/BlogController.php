<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\BlogDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
class BlogController extends Controller
{
    public function getIndex() {
        $blogs = Blog::all();
        return view('admin.pages.blog.index', compact('blogs'));
    }


    public function postAddBlog(Request $request) {
        $blog = new Blog();
        $blog_details = new BlogDetail();

        $rules = [
            'image_name'        => 'required',
            'blog_title_en'     => 'required',
            'blog_title_ar'     => 'required',
            'blog_keywords_en'  => 'required',
            'blog_keywords_ar'  => 'required',
            'blog_content_en'   => 'required',
            'blog_content_ar'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'image_name.required'       => 'Please Upload An Image',
            'blog_title_en.required'    => 'Please Enter A Blog Title In English',
            'blog_title_ar.required'    => 'Please Enter A Blog Title in Arabic',
            'blog_keywords_en.required' => 'Please Enter Key Words in English',
            'blog_keywords_ar.required' => 'Please Enter Key Words in Arabic',
            'blog_content_en.required'  => 'Please Enter A Blog Content in English',
            'blog_content_ar.required'  => 'Please Enter A Blog Content in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/blogs/';
            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $blog->image_name = $file_name;
        }

        $slug = preg_replace('/\s+/', '-', $request->blog_title_en);
        $blog->user_id  = auth()->guard('admins')->user()->id;
        $blog->slug     = $slug;

        $blog->save();

        $blog_details->insert([
            'blog_id'     => $blog->id,
            'title'       => $request->blog_title_en,
            'description' => $request->blog_content_en,
            'keywords'    => $request->blog_keywords_en,
            'lang'        => 'en',
        ]);

        $blog_details->insert([
            'blog_id'     => $blog->id,
            'title'       => $request->blog_title_ar,
            'description' => $request->blog_content_ar,
            'keywords'    => $request->blog_keywords_ar,
            'lang'        => 'ar',
        ]);

        return ['status' => 'success', 'data' => 'Blog Added Successfully'];
    }

    public function getUpdateBlog($id) {
        $blog = Blog::find($id);
        return view('admin.pages.blog.update_blog', compact('blog'));
    }

    public function postUpdateBlog(Request $request) {

        $update_blog = Blog::find($request->id);

        $rules = [
            'blog_title_en'    => 'required',
            'blog_title_ar'    => 'required',
            'blog_keywords_en' => 'required',
            'blog_keywords_ar' => 'required',
            'blog_content_en'  => 'required',
            'blog_content_ar'  => 'required',
        ];


        $validator = Validator::make($request->all(), $rules, [
            'blog_title_en.required'    => 'Please Enter A Blog Title In English',
            'blog_title_ar.required'    => 'Please Enter A Blog Title in Arabic',
            'blog_keywords_en.required' => 'Please Enter Key Words in English',
            'blog_keywords_ar.required' => 'Please Enter Key Words in Arabic',
            'blog_content_en.required'  => 'Please Enter A Blog Content in English',
            'blog_content_ar.required'  => 'Please Enter A Blog Content in Arabic',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/blogs/';
            @unlink($destination . $update_blog->image_name);

            $file_name = time().$file->getClientOriginalName();
            $file->move($destination, $file_name);
            $update_blog->update([
                'image_name' => $file_name,
            ]);
        }

        $update_blog->getDetails()->where(['blog_id' => $update_blog->id, 'lang' => 'en'])->update([
            'title'       => $request->blog_title_en,
            'description' => $request->blog_content_en,
            'keywords'    => $request->blog_keywords_en,
        ]);

        $update_blog->getDetails()->where(['blog_id' => $update_blog->id, 'lang' => 'ar'])->update([
            'title'    => $request->blog_title_ar,
            'description'  => $request->blog_content_ar,
            'keywords'    => $request->blog_keywords_ar,
        ]);

        return ['status' => 'success', 'data' => 'Updated Successfully', 'id' => 'warna'];
    }


    public function getDeleteBlog(Request $request) {

        $blog = Blog::find($request->id);

        $blog->getDetails()->delete();
        $blog->delete();

        @unlink('storage/uploads/blogs/' . $blog->image_name);

        return back()->withC('success')->withM('Deleted Successfully');
    }

}
