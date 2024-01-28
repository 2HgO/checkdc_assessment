<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Poll;
use App\Models\Story;
use App\Services\V1\CommentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Story|Comment|Poll $parent, protected string $item_id)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(CommentService $resolver): void
    {
      $resolver->processComment($this->parent, $this->item_id);
    }
}
