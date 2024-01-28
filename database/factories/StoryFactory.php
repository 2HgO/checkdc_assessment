<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $type = $this->faker->randomElement(['story', 'job']);
      return [
        'id' => $this->faker->numberBetween(100, 100000),
        'by' => Author::factory(),
        'score' => $this->faker->numberBetween(100, 100000),
        'time' => $this->faker->dateTimeThisDecade()->getTimestamp(),
        'text' => $this->faker->text(),
        'title' => $this->faker->text(),
        'url' => $this->faker->text(),
        'category' => $type,
      ];
    }
}
