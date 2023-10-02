<?php


namespace App\Services\Comments;


use App\Models\Comment;

class EloquentCommentService implements CommentService
{

    public function store($data)
    {
        return Comment::create($data);
    }
}
