<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_sl',
        'chapter_name',
        'title',
        'sub_title',
        'estimate_time',
        'slug',
    ];
}
