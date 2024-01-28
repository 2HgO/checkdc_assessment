<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Poll;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $type = $this->faker->randomElement(["Story", "Poll", "Comment"]);
      $id = Comment::factory();
      switch ($type) {
        case 'Story':
          $id = Story::factory();
          break;
        case 'Poll':
          $id = Poll::factory();
          break;
      }
      return [
        'id' => $this->faker->numberBetween(100, 100000),
        'by' => Author::factory(),
        'text' => $this->faker->text(),
        'time' => $this->faker->numberBetween(100, 100000),
      ];
    }
}
