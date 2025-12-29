<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;

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
