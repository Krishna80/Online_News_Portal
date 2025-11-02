@extends('layouts.app')
@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ isset($article) ? 'Edit Article' : 'Create Article' }}</h2>

    <form action="{{ isset($article) ? route('articles.update', $article->artid) : route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" required>
        </div>
        <!--Post Date-->
        <div class="mb-3">
            <label for="podate" class="form-label">Publish Date</label>
            <input type="date" name="podate" id="podate" class="form-control" required>
        </div>
        <!-- Author-->
        <div class="mb-3">
            <label for="Author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $article->title ?? '') }}" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $article->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Featured Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Featured Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if(isset($article) && $article->image)
                <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid mt-2" width="200">
            @endif
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
           <textarea name="content" id="content" class="form-control" rows="10">{{ old('content', $article->content ?? '') }}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">{{ isset($article) ? 'Update' : 'Publish' }}</button>
    </form>
</div>

<!-- article.blade.php -->
@section('scripts')
<script src="{{ asset('js/tinymce-init.js') }}"></script>
@endsection

@endsection
