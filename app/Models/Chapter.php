<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_name',
        'title',
        'sub_title',
        'estimate_time',
        'slug',
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    // LessonStatus
     public function lessonStatus()
     {
         return $this->hasMany(LessonStatus::class);
     }

//    public function lessonStatus()
//    {
//        return $this->hasMany(LessonStatus::class);
//    }

//    public function calculatePercentage()
//    {
//        $totalLesson = $this->lesson->count();
//        $totalLearnedLesson = $this->lessonStatus->where('completed', 1)->count();
//
//        if ($totalLesson == 0) {
//            return 0;
//        }
//
//        return round(($totalLearnedLesson / $totalLesson) * 100);
//    }

}
