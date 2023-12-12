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
@endsection
