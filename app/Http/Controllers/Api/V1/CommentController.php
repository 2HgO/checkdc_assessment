<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CommentCollection;
use App\Http\Resources\V1\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return new CommentCollection(Comment::paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
      return new CommentResource($comment);
    }
}
