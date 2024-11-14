<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($item) {
                    if ($item->image != null) {
                        $image = asset('storage/' . $item->image);
                        return '<td class="py-1"><img src="' . $image . '" width="50" height="50"/></td>>';
                    } else {
                        $url = asset('storage/' . $item->image); // Get image URL
                        return ' <td class="py-1"><img src="' . $url . '" width="50" height="50"/></td>';
                    }
                })
                ->addColumn('category', function ($category) {
                    return $category->category->title;
                })
                ->addColumn('description', function ($desc) {
                    return Str::limit($desc->description, 20);
                })
                ->addColumn('action', function ($data) {
                    return view('Admin.Button.button', compact('data'));
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        $categories = Category::pluck('title', 'id');
        return view('Admin.pages.Post.post', compact('categories'));
    }

    public function store(PostRequest $postRequest)
    {
        DB::beginTransaction();
        try {

            $post = new Post();
            $post->title = $postRequest->input('post_title');
            $post->description = strip_tags($postRequest->input('post_description'));
            $post->category_id = $postRequest->input('post_category_id');
            if ($postRequest->hasFile('post_image')) {
                $filepath = 'images/post/';
                $imagename = time() . '.' . $postRequest->post_image->extension();
                $path = $postRequest->post_image->storeAs($filepath, $imagename, 'public');
                $post->image = $path;
            }
            $post->status = $postRequest->input('post_status');
            $post->created_by = Auth::id();
            $post->save();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
