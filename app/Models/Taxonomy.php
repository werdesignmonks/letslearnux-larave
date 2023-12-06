<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_type',
        'taxonomy_name',
        'taxonomy_slug',
        'file',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

}
