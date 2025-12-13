<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lesson;

class LessonPolicy
{
	public function comment(User $user, Lesson $lesson)
	{
		return $user->purchases()
		 ->where('course_id', $lesson->course->id)
		 ->where('payment_status', 'paid')
		 ->exists();
	}
}
