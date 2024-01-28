<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Story;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Story::factory()
        ->count(2)
        ->for(Author::factory(), 'author')
        ->hasKids(4)
        ->create();
    }
}
