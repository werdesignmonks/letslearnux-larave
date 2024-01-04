<?php

namespace App\Trait;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Log;

trait Likeable
{

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

    function feedback($feedback)
    {
        $this->likes()->updateOrCreate([
            'user_id' => auth()->user()->id,
        ], [
            'feedback' => $feedback,
        ]);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }



}
