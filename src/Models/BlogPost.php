<?php

namespace PaladinDigital\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'title', 'slug', 'body', 'published', 'author_id', 'published_at'
    ];

    public function author()
    {
        $userModel = config('auth.providers.users.model');
        return $this->belongsTo($userModel, 'user_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published', 1);
    }
}
