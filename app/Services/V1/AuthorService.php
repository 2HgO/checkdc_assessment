<?php

namespace App\Services\V1;

use App\Models\Author;
use Illuminate\Support\Facades\Http;

class AuthorService {
  public function __construct() {

  }
  public function processAuthor(string $item_id) {
    $user_id = $item_id;
    $userResponse = Http::get("https://hacker-news.firebaseio.com/v0/user/$user_id.json");
    if (! $userResponse->ok()) {
      throw new \Exception('error while fetching author details: '.$user_id);
    }
    $item = $userResponse->json();
    $item['submitted'] = null;
    
    $author = Author::firstOrNew(['id' => $userResponse->json('id')]);
    $author->created = $userResponse->json('created');
    $author->karma = $userResponse->json('karma');
    $author->about = $userResponse->json('about');
    $author->save();
    return $author;
  }
}
