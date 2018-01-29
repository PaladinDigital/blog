<?php

namespace PaladinDigital\Blog\Http;

use Illuminate\Routing\Controller as BaseController;
use PaladinDigital\Blog\Models\BlogPost;

class BlogController extends BaseController
{
    public function index()
    {
        $perPage = config('pd-blog.per_page');
        $posts = BlogPost::published()->paginate($perPage);
    }
}
