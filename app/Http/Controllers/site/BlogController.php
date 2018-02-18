<?php

namespace App\Http\Controllers\site;


use App\Blog;
use App\BlogDetail;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class BlogController extends Controller
{
    public function getIndex() {
        $blogs = Blog::paginate(6);
        $users = User::all();
        return view('site.pages.blog.index', compact('blogs', 'users'));
    }

    public function getBlog(Request $request ,$slug) {
        $blog  = Blog::where('slug' ,$slug)->first();
        $blogs = Blog::all();
        $users = User::all();
        $comments = Comment::where('blog_id', $blog->id)->get();
        $latest_blogs = Blog::take(3)->orderBy('created_at', 'desc')->get();
        return view('site.pages.blog.one_blog', compact('blog', 'blogs', 'users', 'latest_blogs', 'comments'));
    }


    public function getBlogSearch(Request $request) {
        $users = User::all();

        $search = \Request::get('search');
        $search_array = explode(' ' ,$search);

        if(sizeof($search_array) > 0){
            $p = BlogDetail::select('*');
            $p->where(function ($query) use($search_array) {
                foreach ($search_array as $search_word){
                    $query->orWhere('blog_details.title','like' ,'%'.$search_word.'%')
                        ->orWhere('blog_details.keywords','like','%'.$search_word.'%');
                }
            });

            $p->orderBy('id' ,'desc');

            $blogs = $p->paginate(15);
            return view('site.pages.blog.search', compact('blogs', 'users'));
        }
    }

    public function postAddComment(Request $request) {
        $blog    = Blog::find($request->id);
        $comment = new Comment();

        $rules = [
            'name'    => 'required',
            'email'   => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name.required'    => 'Please Enter Your Name',
            'email.required'   => 'Please Enter Your Email',
            'message.required' => 'Please Enter Your Message',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }


        $comment->insert([
            'blog_id' => $request->id,
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return ['status' => 'success', 'data' => 'Comment Added Successfully', 'html' => view('site.pages.blog.comment', compact('blog'))->render()];
    }

}
