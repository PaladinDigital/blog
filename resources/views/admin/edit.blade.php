@extends($layout)

@section('content')
    <h1>Create Blog Post</h1>

    <form method="POST" action="{{ route('blog.post.update') }}" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="form-group">
            <label for="title">Body</label>
            <textarea class="form-control" name="body"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Featured Image</label>
            <input type="file" class="form-control" name="image" />
        </div>

        <input type="hidden" name="author_id" value="{{ \Auth::user()->id }}" />

        {!! csrf_field() !!}

        <button class="btn btn-primary">Create post</button>

    </form>
@endsection
