@extends($layout)

@section('content')
<h1>Blog Posts <a href="{{ route('blog.post.create-form') }}" class="btn btn-primary pull-right">Create Post</a></h1>

@if (count($posts) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($posts as $post)
            <?php
            $media = $post->getMedia('blog');
            if (count($media) > 0) {
              $image = $media->first();
              $imageUrl = $image->getUrl();
            }
            ?>

            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td><?php if (isset($imageUrl)) { echo "<img src='{$imageUrl}' height='50' />" ; } ?></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

        @endforeach
        </tbody>
    </table>

    {!! $posts->render() !!}
@else
    There are no blog posts to show.
@endif

@endsection
