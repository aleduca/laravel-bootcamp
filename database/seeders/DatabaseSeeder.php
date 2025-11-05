<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $users = User::factory(10)->create();
    $courses = Course::factory(10)->create();

    // Para cada curso, cria 5 aulas
    $courses->each(function ($course) use ($users) {
      $lessons = Lesson::factory(5)->create([
        'course_id' => $course->id,
      ]);

      // Para cada aula, cria 3 comentários
      $lessons->each(function ($lesson) use ($users) {
        $comments = Comment::factory(3)->create(fn() => [
          'lesson_id' => $lesson->id,
          'user_id' => $users->random()->id,
        ]);

        // Para cada comentário, cria 2 respostas
        $comments->each(function ($comment) use ($users) {
          Reply::factory(2)->create(fn() => [
            'comment_id' => $comment->id,
            'user_id' => $users->random()->id,
          ]);
        });
      });
    });
  }
}
