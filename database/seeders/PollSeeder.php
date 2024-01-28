<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Poll::factory()
        ->count(2)
        ->for(Author::factory(), 'author')
        ->hasParts(5)
        ->hasKids(4)
        ->create();
    }
}
