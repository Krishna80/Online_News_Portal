@extends('layouts.frontend')

@section('title', 'Latest Articles')

@section('content')
    <section class="md:col-span-2">
        <h2 class="text-2xl font-semibold border-b-2 border-blue-700 pb-2 mb-6">Latest Articles</h2>

        @foreach($articles as $article)
            <article class="bg-white p-5 rounded-lg shadow-md hover:shadow-lg transition mb-6">
                <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $article->title }}</h3>
                <p class="text-sm text-gray-500 mb-2">
                    {{ \Carbon\Carbon::parse($article->podate)->format('M d, Y') }} • by {{ $article->author }}
                </p>
                <div class="text-gray-700 mb-3">{!! preg_replace('/data-component="[^"]+"/', '', $article->content) !!}</div>
                @include('custom.social')
            </article>
        @endforeach
    </section>

    @include('custom.floatingsocial')
@endsection
