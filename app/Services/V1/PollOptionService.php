<?php

namespace App\Services\V1;

use App\Models\PollOption;
use Illuminate\Support\Facades\Http;

class PollOptionService {
  public function __construct() {

  }
  public function processPollOption(string $item_id) {
    $part_id = $item_id;
    $partResponse = Http::get("https://hacker-news.firebaseio.com/v0/item/$part_id.json");
    if (! $partResponse->ok()) {
      throw new \Exception('error while fetching poll option: '.$part_id);
    }
    $item = $partResponse->json();

    $option = PollOption::firstOrNew(['id' => $item['id']]);
    $option->by = $item['by'];
    $option->poll = $item['poll'];
    $option->score = $item['score'];
    $option->text = $item['text'];
    $option->time = $item['time'];
    $option->save();
  }
}
