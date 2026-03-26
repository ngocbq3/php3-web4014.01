@extends('layouts.main')

@section('title', 'Trang chủ')

@section('content')
    <h1>Những bài viết mới nhất</h1>
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('posts.show', $post->id) }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <div>Danh mục: {{ $post->name }}</div>
            <img src="{{ $post->image }}" width="100" alt="">
            <div>
                {{ $post->content }}
            </div>
            <hr>
        </div>
    @endforeach
@endsection
