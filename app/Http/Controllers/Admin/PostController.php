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
                ->addColumn('image', function ($item) {
                    return "<a type='button' data-id='" . $item->id . "' class='imageListPopup'><span class='badge badge-primary'>" . $item->postImages->count() . "</span></a>";
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
                ->addColumn('comment', function ($data) {
                    return '<button class="btn btn-info commentinfoBtn" data-id="'.$data->id.'" type="button">View Comment</button>';
                })
                ->addColumn('status', function ($status) {
                    $checked = $status->status == 'Active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                    <input class="form-check-input statusIdData d-flex mx-auto" type="checkbox" data-id="'.$status->id.'" role="switch" id="flexSwitchCheckChecked" '.$checked.'>
                    </div>';
                })
                ->rawColumns(['action', 'image', 'comment', 'status'])
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
            $data = Post::with(['category', 'postImages'])->find($id);
            $images = $data->postImages->map(function ($image) {
                return [
                    'id' => $image->id,
                    'path' => $image->image
                ];
            });
            // dd($images);
            return response()->json(['success' => true, 'message' => $data, 'images' => $images]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function destoryImage(Request $request)
    {
        try {
            // dd($request->all());
            $data = PostImage::find($request->image_id);
            //    dd($data->image);
            if ($data->image != null) {
                Storage::disk('public')->delete($data->image);
            }
            $data->delete();

            return response()->json(['success' => true, 'message' => 'Image Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'line' => $e->getTrace()]);
        }
    }

    public function update(PostRequest $postRequest, $id)
    {
        DB::beginTransaction();
        try {
            $data = Post::findOrFail($id);
            $data->title = $postRequest->input('post_title');
            $data->category_id = $postRequest->input('post_category_id');
            $data->description = $postRequest->input('post_description');
            $data->status = $postRequest->input('post_status');
            $data->save();

            if ($postRequest->hasFile('post_images')) {
                $existingImages = PostImage::where('post_id', $id)->get();
                foreach ($existingImages as $image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }

                foreach ($postRequest->file('post_images') as $image) {
                    $imagename = time() . '_' . $image->getClientOriginalName();
                    $imagePath = $image->storeAs('images/post', $imagename, 'public');

                    PostImage::create([
                        'post_id' => $data->id,
                        'image' => $imagePath,
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

    // Toggle Status
    public function statusToggle($id)
    {
        try {
            $data = Post::find($id);
            if ($data->status == 'Active') {
                $data->status = 'Inactive';
            } else {
                $data->status = 'Active';
            }
            $data->save();
            return response()->json(['success' => true, 'message' => 'Status Changes'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function postComment($id){
        try {
            $data = Post::with(['comments'])->find($id);
            $images = $data->comments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'image'=>$comment->user->image
                ];
            });
            // dd($images);
            return response()->json(['success' => true, 'message' => $data, 'images' => $images]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $data = Post::with('postImages')->find($id);

            // dd($data);
            if ($data->postImages != null) {
                foreach ($data->postImages as $img) {
                    Storage::disk('public')->delete($img->image);
                }
            }
            $data->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'line' => $e->getLine(), 'which' => $e->getTrace()]);
        }
    }
}
