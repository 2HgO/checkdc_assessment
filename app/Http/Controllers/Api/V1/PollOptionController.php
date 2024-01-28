<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PollOptionCollection;
use App\Http\Resources\V1\PollOptionResource;
use App\Models\PollOption;

class PollOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return new PollOptionCollection(PollOption::paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(PollOption $pollOption)
    {
      return new PollOptionResource($pollOption);
    }
}
