<!-- liked-comments.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liked Comments</h1>

        @foreach($likedComments as $comment)
            <div class="comment-container">
                <p>{{ $comment->user->name }}: {{ $comment->content }}</p>
                <!-- Add any other comment details you want to display -->
            </div>
        @endforeach
    </div>
@endsection
