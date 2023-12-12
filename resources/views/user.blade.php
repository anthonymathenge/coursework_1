@extends('layouts.app')

@section('title', 'User')

@section('content')
    <div class="container">
        <h2>User Information</h2>
        @if ($user)
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <!-- Add additional fields as needed -->
        @else
            <p>No profile found.</p>
        @endif
        <!-- Add additional fields as needed -->

        <h2>User Activity</h2>
        <ul>
            <!-- ... other activity links ... -->
            <li><a href="{{ route('user.likedposts') }}">View Liked Posts</a></li>
            <li><a href="{{ route('user.likedcomments') }}">View Liked Comments</a></li>
        </ul>
        <h2>Social Media Links</h2>
        <!-- Display links to the user's social media profiles -->
    
        <h2>Badges and Achievements</h2>
        <!-- Display earned badges and achievements -->
  
        <h2>User Preferences</h2>
        <!-- Allow users to customize their experience (language, font size, color scheme, etc.) -->
    </div>
@endsection

