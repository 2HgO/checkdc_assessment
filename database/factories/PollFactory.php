<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poll>
 */
class PollFactory extends Factory
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
          'text' => $this->faker->text(),
          'time' => $this->faker->dateTimeThisDecade()->getTimestamp(),
          'title' => $this->faker->text(),
        ];
    }
}
