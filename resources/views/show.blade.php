<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('title', $user->name . "'s Profile")

@section('content')
    <h1>{{ $user->name }}'s Profile</h1>

    @foreach($user->posts as $post)
        <div class="post-container">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            <!-- Similar code for likes and comments as in your dashboard.blade.php -->

            <h4>Comments:</h4>

            @if($user->comments->count() > 0)
                @foreach ($user->comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            @else
                <p>{{ $user->name }} has made no comments</p>
            @endif
        </div>
    @endforeach
@endsection
