<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    @foreach($users as $user)
        <div class="user-container">
            <h2>{{ $user->name }}</h2>

            <h3>Posts:</h3>
            @foreach($user->posts as $post)
                <p>{{ $post->title }}</p>
            @endforeach

            <h3>Comments:</h3>
            @foreach($user->comments as $comment)
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>
        <hr>
    @endforeach
@endsection

