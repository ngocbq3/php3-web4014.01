@extends('layouts.main')

@section('title', $posts[0]->category->name ?? '')

@section('content')
    <h1>Danh mục {{ $posts[0]->category->name ?? '' }}</h1>
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('posts.show', $post->id) }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <div>Danh mục: {{ $post->category->name }}</div>
            <img src="{{ $post->image }}" width="100" alt="">
            <div>
                {{ $post->content }}
            </div>
            <hr>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection
