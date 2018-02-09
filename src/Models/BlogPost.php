<?php

namespace PaladinDigital\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class BlogPost extends Model implements HasMedia
{
    use HasMediaTrait;

    public $rules = [
        'title'     => 'required|min:1|max:255',
        'slug'      => 'required|min:1|max:255',
        'body'      => 'required|min:1|max:255',
        'author_id' => 'required|min:1|exists:users,id',
    ];

    protected $table = 'blog';

    protected $fillable = [
        'title', 'slug', 'body', 'published', 'author_id', 'published_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    public function publishedAt()
    {
        return $this->published_at->format('d/m/Y H:i');
    }

    public function author()
    {
        $userModel = config('auth.providers.users.model');
        return $this->belongsTo($userModel, 'user_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published', 1);
    }

    public static function validationRules()
    {
        $obj = new BlogPost();
        return $obj->rules;
    }
}
