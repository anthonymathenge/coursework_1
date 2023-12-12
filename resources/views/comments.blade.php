@extends('layouts.app')

@section('title', 'Comments')

@section('content')
    <div class="container">
        <h2>My Comments</h2>
        {{-- Display a list of user's comments with options to edit, delete, and view --}}
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->content }}
                        <form action="{{ route('comment.destroy', $comment) }}" method="post" 
                        onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    <span style="font-size: 20px;">&#128465;</span>
                                </button>
                            </form>
                        </p>
                    </div>
                @endforeach

    </div>
    <div class="container">
        <h1>Edit Comment</h1>
        <form action="{{ route('comment.update', $comment) }}" method="post">
            @csrf
            @method('PUT')
            <label for="content">Content:</label>
            <textarea name="content" required>{{ $comment->content }}</textarea>
            <button type="submit">Update Comment</button>
        </form>
    </div>
@endsection
