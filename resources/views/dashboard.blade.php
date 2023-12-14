@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container mb-5 mt-5">
        @foreach($users as $user)
            @if($user->posts->count() > 0)
            @foreach($user->posts as $post)
                <div class="card">
                
                    <div class="row">
                    
                        <div class="col-md-12">
                                <div class="media mt-4">
                                <img class="mr-3 rounded-circle" alt="User Avatar" src="{{ $post->user->avatarUrl }}" />
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-8 d-flex">
                                                <h5><a href="{{ route('user.show', $user) }}">{{ $post->user->name }}</a></h5>
                                                <span>- {{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <h2>{{ $post->title }}</h2>
                                        <div class="image-container">
                                            <img src="{{ asset(  $post->image_url) }}" alt="" class="post-image">
                                        </div>                                        
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
                                            
                                            <div class="comment-container">
                                                    <!-- Toggle Comment Form Button -->
                                                    <a href="#" class="toggle-comment-form"><span><i class="fa fa-comment"></i> Comment</span></a>

                                                    <!-- Comment Form -->
                                                
                                                    <form class="comment-form" style="display: none;">
                                                    @csrf
                                                    <textarea name="content" placeholder="Add a comment" required></textarea>
                                                    <button type="submit" data-post-id="{{ $post->id }}">Post</button>
                                                    </form>
                                            </div>
                                         </div>
                                        <!-- Edit post link -->
                                        @if ($post->user_id == auth()->id() || auth()->id() == 12345) 
                                            <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
                                        @endif

                                        <!-- Nested Comments -->
                                        @foreach($post->comments as $comment)
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
                                                    <a href="{{ route('comment.edit', $comment) }}">Edit Comment</a>


                                                    <!-- Delete and Edit Comment Logic -->
                                                    @if($comment->user_id == auth()->id() || auth()->id() == 12345)
                                                        <form action="{{ route('comment.destroy', $comment) }}" method="post" 
                                                            onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                                                <span style="font-size: 20px;">&#128465;</span>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <!-- Delete post button -->
                                                    
                                                    <!-- Add reply button if needed -->
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($post->user_id == auth()->id() || auth()->id() == 12345)
                                            <form action="{{ route('post.destroy', $post) }}" method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete Post</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            
                        </div>
                    
                    </div>
                    
                </div>
                @endforeach
            @endif
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $users->links('dashpagination') }}
        </div>

   
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add click event listener to toggle comment form
            document.querySelectorAll('.toggle-comment-form').forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    // Toggle visibility of the associated comment form
                    var commentForm = this.nextElementSibling;
                    if (commentForm.style.display === 'none' || commentForm.style.display === '') {
                        commentForm.style.display = 'block';
                    } else {
                        commentForm.style.display = 'none';
                    }
                });
            });
        });
    </script>
    
@endsection



