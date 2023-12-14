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
}
