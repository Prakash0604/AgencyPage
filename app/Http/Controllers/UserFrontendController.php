<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Notice;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Machine;
use App\Models\Setting;
use App\Models\frontend;
use App\Models\HomeSlide;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Achievement;

class UserFrontendController extends Controller
{

    public function home(){
        $frontend=Setting::first();
        $homeslides=HomeSlide::where('status','Active')->get();
        // dd($homeslides);
        $testimonials=Testimonial::where('status','Active')->get();
        $notice=Notice::where('status','Active')->first();
        $achievements=Achievement::where('status','Active')->get();
        // dd($notice);
        // return view('User.home',compact(['frontend','homeslides','testimonials','notice']));
        return view('User.home',compact(['frontend','homeslides','testimonials','notice','achievements']));
    }
    public function aboutUs(){
        $users=User::where('role','Admin')->get();
        $frontend=Setting::first();
        $achievements=Achievement::where('status','Active')->get();
        return view('User.about',compact('users','frontend','achievements'));
    }

    public function contactUs(){
        return view('User.contact',);
    }

    public function storeContactUs(ContactRequest $request){
        try{
            Contact::create($request->validated());
            return back()->with(['message'=>'Message has been Submited']);
        }catch(\Exception $e){
            return back()->with(['error'=>'Something Went Wrong!']);
        }
    }


    public function post()
    {
        $posts = Post::with(['createdBy', 'category','postImages'])->where('status', 'Active')->orderBy('id','desc')->paginate(5);
        // dd($posts);
        return view('User.Post.post', compact('posts'));
    }

    public function machine()
    {
        $machines = Machine::where('status', 'Active')->orderBy('id','desc')->paginate(5);
        // dd($posts);
        return view('User.Machine.machine', compact('machines'));
    }

    public function singlePost($id)
    {
        $images = Post::with(['postImages' => function($query) use ($id) {
            $query->where('post_id', $id);
        }])->findOrFail($id);
        $post = Post::with(['createdBy', 'category','postImages','comments'])->find($id);
        $comments = Comment::with('user')->where('commentable_id',$id )->get();
        return view('User.Post.single-post', compact('post','comments','images'));
    }


}
