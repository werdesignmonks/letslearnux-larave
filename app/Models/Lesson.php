<?php

namespace App\Models;

use App\Trait\Likeable;
use App\Trait\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{
    use HasFactory;
    use Likeable;
    use Status;

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

    public function lessonStatus()
    {
        return $this->hasOne(LessonStatus::class);
    }

}
