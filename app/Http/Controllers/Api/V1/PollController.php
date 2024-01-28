<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PollCollection;
use App\Http\Resources\V1\PollResource;
use App\Models\Poll;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return new PollCollection(Poll::withCount('kids')->withSum('parts as total_votes', 'score')->paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
      return new PollResource($poll->loadCount('kids')->loadSum('parts as total_votes', 'score'));
    }
}
