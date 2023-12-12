@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    @foreach($users as $user)
        @if($user->posts->count() > 0)
            <div class="user-container">
            <h2><a href="{{ route('user.show', $user) }}">{{ $user->name }}</a></h2>

                @foreach($user->posts as $post)
                    <div class="post-container">
                        <p>{{ $post->title }} : {{ $post->content }}</p>


                        <div class="like-container">
                        <!-- Add a data attribute to store the initial liked status -->
                        <button class="like-post-btn" data-post-id="{{ $post->id }}" 
                        data-initial-liked="{{ $post->isLikedByAuthUser() ? 'true' : 'false' }}">
                         <span class="heart">❤️</span> 
                        </button>

                        <span class="like-count" data-post-id="{{ $post->id }}" 
                        data-initial-count="{{ $post->likes->count() }}">0</span> Likes
                        </div>

                        <h4>Comments:</h4>

                        @if($post->comments->count() > 0)
                            @foreach($post->comments as $comment)
                                <div class="comment-container">
                                    <p>{{ $comment->user->name }}: {{ $comment->content }}
                                   <!-- Add a data attribute to store the initial liked status -->
                                    <button class="like-comment-btn" data-comment-id="{{ $comment->id }}"
                                    data-initial-liked="{{ $comment->isLikedByAuthUser() ? 'true' : 'false' }}">
                                    <span class="heart">❤️</span>
                                    </button>
                                    <span class="like-count" data-comment-id="{{ $comment->id }}" d
                                    ata-initial-count="{{ $comment->likes->count() }}">0</span> Likes
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <p>hmmmm... It's quiet here</p>
                        @endif
                        <form class="comment-form">
                        @csrf
                        <textarea name="content" placeholder="Add a comment" required></textarea>
                        <button type="submit" data-post-id="{{ $post->id }}">Comment</button>
                    </form>
                    </div>
                @endforeach
            </div>
            <hr>
        @endif
    @endforeach
<!-- Include jQuery before your custom script x                            <span class="heart">❤️</span>                                
 -->

@endsection



