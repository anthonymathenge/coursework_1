@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center mb-2">
                        </div>
                        @foreach($posts as $post)
                            <div class="card mb-4">
                            <h1>Your Posts</h1>
                                <div class="card-body">
                                    <div class="col-8 d-flex">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <span class="ml-2">- {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="card-text">{{ $post->content }}</p>

                                    <!-- Display comments for the current post -->
                                    <h3 class="mt-4">Comments</h3>
                                    @foreach($post->comments as $comment)
                                        <div class="media mt-3">
                                            <a class="pr-3" href="#"><img class="rounded-circle" alt="User Avatar" src="{{ $comment->user->avatarUrl }}" /></a>
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex align-items-center">
                                                        <h5>{{ $comment->user->name }}</h5>
                                                        <span class="ml-2">- {{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <p>{{ $comment->content }}</p>

                                                <div class="like-container">
                                                    <button class="like-comment-btn" data-comment-id="{{ $comment->id }}"
                                                        data-initial-liked="{{ $comment->isLikedByAuthUser() ? 'true' : 'false' }}">
                                                        <span class="heart">❤️</span>
                                                    </button>
                                                    <span class="like-count" data-comment-id="{{ $comment->id }}" 
                                                        data-initial-count="{{ $comment->likes->count() }}">
                                                        {{ $comment->likes->count() }}
                                                    </span> Likes
                                                    <a href="{{ route('comment.edit', $comment) }}">Edit Comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Edit Post Link -->
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>

                                    <!-- Delete Post Form -->
                                    <form action="{{ route('post.destroy', $post) }}" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Post</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Create Post Form -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-4">Create Post</h1>
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <!-- Add a textarea for post content -->
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" name="content" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
