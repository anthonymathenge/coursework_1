<!-- liked-posts.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liked Posts</h1>

        @foreach($likedPosts as $post)
            <div class="post-container">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <!-- Add any other post details you want to display -->
            </div>
        @endforeach
    </div>
@endsection
