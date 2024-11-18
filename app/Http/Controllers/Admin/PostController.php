<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Post::with('postImages')->orderBy('id', 'desc')->get();
            // dd($data);
            return DataTables::of($data)
                // ->setTotalRecords($totalRecords)
                ->addIndexColumn()
                ->addColumn('image', function ($item)
                {
                    return "<a type='button' data-id='".$item->id."' class='imageListPopup'><span class='badge badge-primary'>".$item->postImages->count() ."</span></a>";
                    // if ($item->postImages && $item->postImages->count() > 0) {
                    //     foreach ($item->postImages as $index=>$postImage) {
                    //         // dd($postImage->image);
                    //             $imageHtml = '<ul class="persons">';
                    //             $imageUrl = asset('storage/' . $postImage->image);
                    //             $imageHtml = '<li><a href=""> <img src="' . $imageUrl . '" alt="Image" class="img-fluid" width="50" height="50"> </a></li>';
                    //             $imageHtml = "</ul>";
                    //             return $imageHtml;
                    //     }
                    // } else {
                    //     return '<span>No Images Available</span>';
                    // }
                })
                ->addColumn('title', function ($title) {
                    return $title->title ?? '';
                })
                ->addColumn('category', function ($category) {
                    return $category->category->title ?? '';
                })
                ->addColumn('description', function ($desc) {
                    return Str::limit(strip_tags($desc->description), 20) ?? '';
                })
                ->addColumn('created_by', function ($created) {
                    return $created->createdBy->full_name ?? '';
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
            $post->description = $postRequest->input('post_description');
            $post->category_id = $postRequest->input('post_category_id');
            $post->status = $postRequest->input('post_status');
            $post->created_by = Auth::id();
            $post->save();

            // To Save Multiple Images
            if ($postRequest->hasFile('post_images')) {
                $filepath = 'images/post/';
                foreach ($postRequest->post_images as $image) {
                    $imagename = time() . '.' . $image->getClientOriginalName();
                    $path = $image->storeAs($filepath, $imagename, 'public');
                    PostImage::create([
                        'post_id' => $post->id,
                        'image' => $path
                    ]);
                }
            }
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function getDetail($id)
    {
        try {
            $data = Post::with(['category','postImages'])->find($id);
            $images=$data->postImages->pluck('image');
            // dd($images);
            return response()->json(['success' => true, 'message' => $data,'images'=>$images]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function update(PostRequest $postRequest, $id)
    {
        DB::beginTransaction();
        try {
            $data = Post::find($id);
            $data->title = $postRequest->input('post_title');
            $data->category_id = $postRequest->input('post_category_id');
            $data->description = $postRequest->input('post_description');
            $data->status = $postRequest->input('post_status');
            if ($postRequest->hasFile('post_image')) {
                $filepath = 'images/post/';
                if ($data->image !== null) {
                    Storage::disk('public')->delete($data->image);
                }
                $imagename = time() . '.' . $postRequest->post_image->extension();
                $path = $postRequest->post_image->storeAs($filepath, $imagename, 'public');
                $data->image = $path;
            }
            $data->save();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $data = Post::with(['postImage'])->find($id);

            dd($data);
            // if ($data->postImage->image) {
            //     Storage::disk('public')->delete($data->postImage->image);
            // }
            $data->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'line' => $e->getLine(), 'which' => $e->getTrace()]);
        }
    }
}
