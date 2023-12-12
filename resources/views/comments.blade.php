@extends('layouts.app')

@section('title', 'Comments')

@section('content')
    <div class="container">
        <h2>My Comments</h2>
        {{-- Display a list of user's comments with options to edit, delete, and view --}}
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach

    </div>
@endsection
