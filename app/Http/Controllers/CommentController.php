<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Services\Comments\CommentService;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function __invoke(StoreRequest $request)
    {
        $data = array_merge($request->validated(), ['add_id' => $request->get('add_id')]);

        $this->commentService->store($data);

        return redirect()->back()->with('comment_success', config('constants.messages.comments.comment_success'));
    }
}
