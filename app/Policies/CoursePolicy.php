<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

class CoursePolicy
{
	public function access(User $user, Course $course)
	{
		return $user->purchases()
		 ->where('course_id', $course->id)
		 ->where('payment_status', 'paid')
		 ->exists();
	}
}
