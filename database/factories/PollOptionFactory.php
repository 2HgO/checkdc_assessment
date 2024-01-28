<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollOption>
 */
class PollOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'id' => $this->faker->numberBetween(100, 100000),
          'by' => Author::factory(),
          'poll' => Poll::factory(),
          'score' => $this->faker->numberBetween(100, 100000),
          'time' => $this->faker->dateTimeThisDecade()->getTimestamp(),
          'text' => $this->faker->text(),
        ];
    }
}
