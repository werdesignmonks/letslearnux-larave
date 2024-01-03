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

    public function scopeWithLikes($query)
    {
        $query->leftJoinSub(
            'select lesson_id, sum(liked) likes, sum(!liked) dislikes from likes group by lesson_id',
            'likes',
            'likes.lesson_id',
            'lessons.id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id,
        ], [
            'liked' => $liked,
        ]);
    }

    public function disLike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('lesson_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDisLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('lesson_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
