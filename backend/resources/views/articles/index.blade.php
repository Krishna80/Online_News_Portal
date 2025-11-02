@extends('layouts.app')
@section('title', 'Articles')
@section('content')
<div class="container mt-4">
    <h2>Articles <a href="{{ route('articles.create') }}" class="btn btn-primary float-end">Add New</a></h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->artid }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->podate }}</td>
                <td>{{ $article->author }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->artid) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->artid) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
</div>
@endsection
