<!-- liked-comments.blade.php -->
@extends('layouts.app')

@section('title', 'Liked Comments')

@section('content')
    <div class="container mb-5 mt-5">
    <h1>Liked Comments</h1>
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    @foreach($likedComments as $comment)
                        <div class="media mt-3">
                            <a class="pr-3" href="#"><img class="rounded-circle" alt="User Avatar" src="{{ $comment->user->avatarUrl }}" /></a>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <h5>{{ $comment->user->name }}</h5>
                                        <span>- {{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p>{{ $comment->content }}</p>
                                <!-- Add any other comment details you want to display -->

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
                                <!-- Add any other features for comments if needed -->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

