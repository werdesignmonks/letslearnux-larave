<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'custom_sl',
        'title',
        'description',
        'slug',
        'like',
        'dislike',
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

    public function learnStatus()
    {
        return $this->hasMany(LearnStatus::class);
    }

    public function getLikeAttribute($value)
    {
        return $value ?? 0;
    }

}
