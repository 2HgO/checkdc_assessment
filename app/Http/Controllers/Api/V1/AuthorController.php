<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AuthorCollection;
use App\Http\Resources\V1\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return new AuthorCollection(Author::paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
      return new AuthorResource($author);
    }
}
