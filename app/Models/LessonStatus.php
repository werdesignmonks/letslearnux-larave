<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'chapter_id',
        'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }

    function completionPercentage($chapterId)
    {
        $lessonCount = Lesson::query()->where('chapter_id', $chapterId)->count();
        $completedLessonCount = LessonStatus::query()
            ->where('user_id', auth()->user()->id)
            ->where('chapter_id', $chapterId)
            ->where('completed', true)->count();

        $progress = ($completedLessonCount / $lessonCount) * 100;

        return $progress;
    }
}
