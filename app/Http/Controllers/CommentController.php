<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $commentRequest)
    {
        try {
            if (auth()->id() == null) {
                return response()->json(['auth'=>null]);
            } else {
                $comment = Comment::create([
                    'comment' => $commentRequest->comment,
                    'user_id' => auth()->id(),
                    'post_id' => $commentRequest->post_id,
                ]);
            }


            return response()->json(['success' => true,]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
