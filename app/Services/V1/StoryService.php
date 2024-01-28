<?php

namespace App\Services\V1;

use App\Jobs\ProcessAuthor;
use App\Jobs\ProcessComment;
use App\Models\Story;
use Illuminate\Support\Facades\Http;

class StoryService {
  public function __construct() {

  }
  public function processStory(string $item_id) {
    $story_id = $item_id;
    $storyResponse = Http::get("https://hacker-news.firebaseio.com/v0/item/$story_id.json");
    if (! $storyResponse->ok()) {
      throw new \Exception('error while fetching story: '.$story_id);
    }
    $item = $storyResponse->json();

    ProcessAuthor::dispatch($item['by']);
    
    $story = Story::firstOrNew(['id' => $item['id']]);
    $story->by = $item['by'];
    $story->score = $item['score'];
    $story->text = $item['text'] ?? null;
    $story->time = $item['time'];
    $story->title = $item['title'];
    $story->url = $item['url'] ?? null;
    $story->category = $item['type'];
    $story->save();

    if (isset($item['kids'])) {
      foreach ($item['kids'] as $comment_id) {
        ProcessComment::dispatch($story, $comment_id);
      }
    }
  }
}
