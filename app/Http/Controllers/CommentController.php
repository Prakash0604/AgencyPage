<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $commentRequest)
    {
        try {
            if (auth()->id() == null) {
                return response()->json(['auth' => null]);
            } else {
                Comment::create([
                    'content' => $commentRequest->content,
                    'user_id'=>auth()->id(),
                    'commentable_id' => $commentRequest->commentable_id,
                    'commentable_type' => $commentRequest->commentable_type,
                ]);
            }

            return response()->json(['success' => true,]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data = Comment::find($id);
            return response()->json(['success' => true, 'message' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(CommentRequest $commentRequest, $id)
    {
        DB::beginTransaction();
        try {
            Comment::find($id)->update([
                'content'=>$commentRequest->content
            ]);
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Comment::find($id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
