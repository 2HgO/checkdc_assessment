<?php

namespace App\Jobs;

use App\Services\V1\AuthorService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAuthor implements ShouldQueue
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
    public function handle(AuthorService $resolver): void
    {
      $resolver->processAuthor($this->item_id);
    }
}
