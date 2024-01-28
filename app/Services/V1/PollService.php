<?php

namespace App\Services\V1;

use App\Jobs\ProcessAuthor;
use App\Jobs\ProcessComment;
use App\Jobs\ProcessPollOption;
use App\Models\Poll;
use Illuminate\Support\Facades\Http;

class PollService {
  public function __construct() {

  }
  public function processPoll(string $item_id) {
    $poll_id = $item_id;
    $pollResponse = Http::get("https://hacker-news.firebaseio.com/v0/item/$poll_id.json");
    if (! $pollResponse->ok()) {
      throw new \Exception('error while fetching poll: '.$poll_id);
    }
    $item = $pollResponse->json();

    ProcessAuthor::dispatch($item['by']);
    
    $poll = Poll::firstOrNew(['id' => $item['id']]);
    $poll->by = $item['by'];
    $poll->text = $item['text'];
    $poll->time = $item['time'];
    $poll->title = $item['title'];
    $poll->save();

    if (isset($item['parts'])) {
      foreach ($item['parts'] as $part_id) {
        ProcessPollOption::dispatch($part_id);
      }
    }

    if (isset($item['kids'])) {
      foreach ($item['kids'] as $comment_id) {
        ProcessComment::dispatch($poll, $comment_id);
      }
    }
  }
}
