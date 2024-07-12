<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tweet extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tweets';
    protected $fillable = [
        'user',
        'content',
        'hashtags',
        'likes_count',
        'published_at',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];
}
