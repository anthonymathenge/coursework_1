@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<h1 style="color: white;">Your Comments</h1>

    <div class="container mb-5 mt-5">
        @foreach ($comments as $comment)
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media mt-3">
                        <a class="pr-3" href="#"><img class="rounded-circle" alt="User Avatar" src="{{ $comment->user->avatarUrl }}" /></a>

                            <div class="media-body">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <h5><a href="{{ route('user.show', $comment->user) }}">{{ $comment->user->name }}</a></h5>
                                    <span>- {{ $comment->created_at->diffForHumans() }}</span>
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
                                                </div>

                                                <div class="col-12 d-flex">
                                        
                                        <form action="{{ route('comment.destroy', $comment) }}" method="post" 
                                            onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                                <span style="font-size: 20px;">&#128465;</span>
                                            </button>
                                        </form>
                                    </div>

                                <!-- Add any other comment details you want to display -->

                                <!-- Edit button for comments -->
                                <a href="{{ route('comment.edit', $comment) }}" class="edit-comment-btn">
                                    Edit Comment
                                </a>
                                <!-- Add any other features for comments if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


