@extends('layouts.app')
@section('title', 'Edit Article')

@section('content')
<div class="container">
    <h2>Edit Article</h2>

    <form action="{{ route('articles.update', $article->artid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Featured Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid mt-2" width="200">
            @endif
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10">{{ old('content', $article->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
