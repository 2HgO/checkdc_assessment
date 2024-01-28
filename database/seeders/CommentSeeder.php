<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Poll;
use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Comment::factory()
        ->count(2)
        ->for(
          Comment::factory()->for(Story::factory(), 'parent'), 'parent'
        )
        ->create();
    }
}
