<?php

namespace App\Trait;

use App\Models\LessonStatus;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Log;

trait Status
{

    public function statusComplete($user = null, $completed = true)
    {
        $this->completed()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id,
            'chapter_id' => $this->chapter_id,
        ], [
            'completed' => $completed,
        ]);
    }

    public function statusUnComplete($user = null)
    {
        return $this->statusComplete($user, false);
    }

    public function isCompletedBy(User $user)
    {
        return (bool) $user->completed
            ->where('chapter_id', $this->chapter_id)
            ->where('lesson_id', $this->id)
            ->where('completed', true)
            ->count();
    }

    public function isUnCompletedBy(User $user)
    {
        return (bool) $user->completed
            ->where('chapter_id', $this->chapter_id)
            ->where('lesson_id', $this->id)
            ->where('completed', false)
            ->count();
    }

    public function completed()
    {
        return $this->hasMany(LessonStatus::class);
    }

}
