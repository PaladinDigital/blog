<?php

namespace PaladinDigital\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'name', 'email', 'password',
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
