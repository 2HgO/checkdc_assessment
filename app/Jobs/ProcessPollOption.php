<?php

namespace App\Jobs;

use App\Services\V1\PollOptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPollOption implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $item_id)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(PollOptionService $resolver): void
    {
      $resolver->processPollOption($this->item_id);
    }
}
