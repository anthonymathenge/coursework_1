@extends('layouts.app')

@section('title', $user->name . "'s Profile")

@section('content')
    <h1 style="color: white;">{{ $user->name }}'s Profile</h1>

    @foreach($user->posts as $post)
        <div class="container mt-5">
            <div class="card mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media mt-4">
                            <img class="mr-3 rounded-circle" alt="User Avatar" src="{{ $user->avatarUrl }}" />
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5>{{ $user->name }}</h5>
                                        <span>- {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <h2>{{ $post->title }}</h2>
                                <p>{{ $post->content }}</p>

                                <!-- Like button for posts -->
                                <div class="like-container">
                                    <button class="like-post-btn" data-post-id="{{ $post->id }}" 
                                        data-initial-liked="{{ $post->isLikedByAuthUser() ? 'true' : 'false' }}">
                                        <span class="heart">❤️</span> 
                                    </button>
                                    <span class="like-count" data-post-id="{{ $post->id }}" 
                                        data-initial-count="{{ $post->likes->count() }}">
                                        {{ $post->likes->count() }}
                                    </span> Likes
                                </div>

                                <h4>Comments:</h4>

                                @if($post->comments->count() > 0)
                                    @foreach ($post->comments as $comment)
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

                                                <!-- Like button for comments -->
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
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No comments for this post yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

