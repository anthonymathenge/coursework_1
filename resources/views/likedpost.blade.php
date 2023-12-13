<!-- liked-posts.blade.php -->
@extends('layouts.app')

@section('title', 'Liked Posts')

@section('content')
    <div class="container mb-5 mt-5">
    <h1>Liked Posts</h1>
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    @foreach($likedPosts as $post)
                        <div class="media mt-4">
                            <img class="mr-3 rounded-circle" alt="User Avatar" src="{{ $post->user->avatarUrl }}" />
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5><a href="{{ route('user.show', $post->user) }}">{{ $post->user->name }}</a></h5>
                                        <span>- {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <h2>{{ $post->title }}</h2>
                                <p>{{ $post->content }}</p>
                                <!-- Add any other post details you want to display -->

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
                                <!-- Add any other features like comments if needed -->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

