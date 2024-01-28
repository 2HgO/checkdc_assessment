<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StoryCollection;
use App\Http\Resources\V1\StoryResource;
use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return new StoryCollection(Story::withCount('kids')->paginate());
    }
    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
      return new StoryResource($story->loadCount('kids'));
    }
}
