<?php

namespace PaladinDigital\Blog\Models;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
