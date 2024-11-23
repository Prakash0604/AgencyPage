<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frontend;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use App\Models\HomeSlide;
use App\Models\Setting;
use App\Models\Testimonial;

class UserFrontendController extends Controller
{

    public function home(){
        $frontend=Setting::first();
        $homeslides=HomeSlide::where('status','Active')->get();
        // dd($homeslides);
        $testimonials=Testimonial::where('status','Active')->get();
        return view('User.home',compact(['frontend','homeslides','testimonials']));
    }
    public function aboutUs(){
        $users=User::where('role','Admin')->get();
        $frontend=frontend::first();
        return view('User.about',compact('users','frontend'));
    }

    public function contactUs(){
        return view('User.contact',);
    }


    public function post()
    {
        $posts = Post::with(['createdBy', 'category','postImages'])->where('status', 'Active')->orderBy('id','desc')->paginate(5);
        // dd($posts);
        return view('User.Post.post', compact('posts'));
    }

    public function singlePost($id)
    {
        $post = Post::with(['createdBy', 'category','postImages','comments'])->find($id);
        $comments = Comment::with('user')->where('commentable_id',$id )->get();
        return view('User.Post.single-post', compact('post','comments'));
    }
}
