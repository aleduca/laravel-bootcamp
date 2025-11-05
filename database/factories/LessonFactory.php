<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(4),
      'description' => $this->faker->paragraph(),
      'video_url' => 'https://www.youtube.com/watch?v=rqtZ0EmciJ8', // video crud Laravel
    ];
  }
}
