<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frontend;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use App\Models\HomeSlide;
use App\Models\Testimonial;

class UserFrontendController extends Controller
{

    public function home(){
        $frontend=frontend::first();
        $title="Hello world";
        $homeslides=HomeSlide::where('status','Active')->get();
        $testimonials=Testimonial::where('status','Active')->get();
        return view('home',compact(['frontend','title','homeslides','testimonials']));
    }
    public function aboutUs(){
        $users=User::where('role','Admin')->get();
        $frontend=frontend::first();
        return view('about',compact('users','frontend'));
    }

    public function contactUs(){
        return view('contact',);
    }


    public function post()
    {
        $posts = Post::with(['createdBy', 'category','postImages'])->where('status', 'Active')->orderBy('id','desc')->paginate(5);
        // dd($posts);
        return view('Post.post', compact('posts'));
    }

    public function singlePost($id)
    {
        $post = Post::with(['createdBy', 'category','postImages','comments'])->find($id);
        $comments = Comment::with('user')->where('commentable_id',$id )->get();
        return view('Post.single-post', compact('post','comments'));
    }
}
