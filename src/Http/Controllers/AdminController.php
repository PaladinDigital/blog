<?php

namespace PaladinDigital\Blog\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PaladinDigital\Blog\Models\BlogPost;

class AdminController extends BaseController
{
    public function index()
    {
        $perPage = config('pd-blog.per_page');
        $posts = BlogPost::published()->paginate($perPage);

        return view('blog::admin.index', ['posts' => $posts]);
    }

    public function form()
    {
        return view('blog::admin.create');
    }

    public function view($postId)
    {
      try {
        $post = BlogPost::where('id', $postId)->firstOrFail();
      } catch (Exception $e) {
        return redirect();
      }
    }

    public function store(Request $request)
    {
        $rules = BlogPost::validationRules();
        $data = $request->validate($rules);

        $data['published_at'] = new Carbon();
        $data['published'] = 1;

        $post = BlogPost::create($data);

        if ($request->has('image')) {
            $image = $request->file('image');
        }

        $post->addMedia($image)->toMediaCollection('blog');

        return redirect()->route('blog.index');
    }
}
