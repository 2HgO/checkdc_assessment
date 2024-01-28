<?php

namespace App\Console\Commands;

use App\Jobs\ProcessPoll;
use App\Jobs\ProcessStory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PollStories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'poll:stories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Poll at most 100 new stories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $response = Http::get('https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty&limitToFirst=100&orderBy="$key"');
      if (! $response->ok()) {
        throw new \Exception('error while fetching stories');
      }

      foreach ($response->json() as $item_id) {
        ProcessStory::dispatch($item_id);
      }
    }
}
