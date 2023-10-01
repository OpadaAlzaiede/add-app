<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $comment = new Comment($request->validated());
        $comment->user_id = Auth::id();
        $comment->add_id = $request->get('add_id');
        $comment->save();

        return redirect()->back()->with('comment_success', config('constants.messages.comments.comment_success'));
    }
}
