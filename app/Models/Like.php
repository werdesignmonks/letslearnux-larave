<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'user_id',
        'liked',
        'feedback'
    ];


//    public function lesson()
//    {
//        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
//    }
//
//    public function user()
//    {
//        return $this->belongsTo(User::class, 'user_id', 'id');
//    }

}
