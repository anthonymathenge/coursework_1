@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Posts</h1>
        @foreach($posts as $post)
            <div class="post-container">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                
                <!-- Display comments for the current post -->
                <h3>Comments</h3>
                @foreach($post->comments as $comment)
                    <p>{{ $comment->content }}</p>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="container">
        <h1>Create Post</h1>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            
            <!-- Add a textarea for post content -->
            <label for="content">Content:</label>
            <textarea name="content" rows="4" required></textarea>

            <button type="submit">Create Post</button>
        </form>
    </div>
@endsection




