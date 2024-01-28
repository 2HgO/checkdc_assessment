<?php

namespace App\Services\V1;

use App\Jobs\ProcessAuthor;
use App\Jobs\ProcessComment;
use App\Models\Comment;
use App\Models\Poll;
use App\Models\Story;
use Illuminate\Support\Facades\Http;

class CommentService {
  public function __construct() {

  }
  public function processComment(Story|Poll|Comment $parent, string $item_id) {
    $comment_id = $item_id;
    $commentResponse = Http::get("https://hacker-news.firebaseio.com/v0/item/$comment_id.json");
    if (! $commentResponse->ok()) {
      throw new \Exception('error while fetching comment: '.$comment_id);
    }
    $item = $commentResponse->json();

    ProcessAuthor::dispatch($item['by']);

    $comment = Comment::firstOrNew(['id' => $item['id']]);
    $comment->by = $item['by'];
    $comment->text = $item['text'];
    $comment->time = $item['time'];
    $comment->parent()->associate($parent);
    $comment->save();

    if (isset($item['kids'])) {
      foreach ($item['kids'] as $c_id) {
        ProcessComment::dispatch($comment, $c_id);
      }
    }
  }
}
