<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
		$title = $this->faker->sentence(4);

		return [
			'title' => $title,
			'slug' => Str::slug($title),
			'description' => $this->faker->paragraph(),
			'duration' => mt_rand(60, 4500),
			'video_url' => 'https://www.youtube.com/embed/rqtZ0EmciJ8?si=AQgOSlbeJHR_fPUP', // video crud Laravel
		];
	}
}
