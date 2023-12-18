<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resource extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    const TYPE_BOOK = 'book';
    const TYPE_VIDEO = 'video';
    const TYPE_ARTICLE = 'article';

    public const PLACEHOLDER_IMAGE = 'images/placeholder-image.jpg';

    protected $fillable = [
        'title',
        'type',
        'url',
        'user_id',
        'lesson_id',
        'status',
        'image',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getImageAttribute() : string
    {
        return $this->hasMedia()  ? $this->getFirstMediaUrl('default') : asset(self::PLACEHOLDER_IMAGE);
    }

}
