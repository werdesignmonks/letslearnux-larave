<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'serial',
        'title',
        'description',
        'slug',
        'likes',
        'dislikes',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }

    public function resource()
    {
        return $this->hasMany(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(User::class, 'lesson_id', 'id');
    }

    public function dislikes()
    {
        return $this->hasMany(User::class, 'lesson_id', 'id');
    }



    public function learnStatus()
    {
        return $this->hasMany(LearnStatus::class, 'lesson_id', 'id');
    }


}
