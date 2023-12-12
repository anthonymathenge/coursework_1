@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <ul>
            @foreach($posts as $post)
                <li>
                    {{ $post->title }}
                    <button class="like-post" data-post-id="{{ $post->id }}">Like</button>
                    <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="post">
                        @csrf
                        <input type="text" name="body" placeholder="Your comment">
                        <button type="submit">Comment</button>
                    </form>
                    <ul>
                        @foreach($post->comments as $comment)
                            <li>
                                {{ $comment->content }}
                                <button class="like-comment" data-comment-id="{{ $comment->id }}">Like</button>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <h1>Create Post</h1>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <button type="submit">Create Post</button>
        </form>
    </div>
@endsection

