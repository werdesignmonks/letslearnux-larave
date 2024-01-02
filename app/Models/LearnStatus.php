<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chapter_id', // 'lesson_id' => 'chapter_id'
        'lesson_id',
        'likes',
        'dislikes',
        'is_completed',
        'progress',
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
}
