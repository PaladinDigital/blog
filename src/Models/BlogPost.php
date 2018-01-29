<?php

namespace PaladinDigital\Blog\Models;

use Illuminate\Database\Eloquent\Builder;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function scopePublished(Builder $query)
    {
        return $query->where('published', true);
    }
}
