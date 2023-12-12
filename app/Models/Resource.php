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

    public const PLACEHOLDER_IMAGE = 'images/avatar-placeholder.jpg';

    protected $fillable = [
        'title',
        'type',
        'url',
        'user_id',
        'status',
        'image',
        'chapter_id',
    ];

    public function lession()
    {
        return $this->hasMany(Lesson::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function getProfileImageAttribute() : string
    {
        return $this->hasMedia()  ? $this->getFirstMediaUrl('default') : asset(self::PLACEHOLDER_IMAGE);
    }

}
