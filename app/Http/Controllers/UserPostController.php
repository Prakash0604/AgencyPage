<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class UserPostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['createdBy', 'category'])->where('status', 'Active')->paginate(5);
        return view('Post.post', compact('posts'));
    }

    public function singlePost($id)
    {
        $post = Post::with(['createdBy', 'category'])->find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('Post.single-post', compact('post', 'comments'));
    }
}
