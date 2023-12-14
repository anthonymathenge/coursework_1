@extends('layouts.app')

@section('title', 'User')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>User Information</h2>
            </div>
            <div class="card-body">
                @if ($user)
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <!-- Add additional fields as needed -->
                @else
                    <p>No profile found.</p>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h2>User Activity</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <!-- ... other activity links ... -->
                    <li class="list-group-item"><a href="{{ route('user.likedposts') }}">View Liked Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('user.likedcomments') }}">View Liked Comments</a></li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h2>Social Media Links</h2>
            </div>
            <div class="card-body">
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-codepen"></i></a></li>
                    <!-- Add more social media icons as needed -->
                </ul>
            </div>
        </div>

        <div class="card mt-4">
    <div class="card-header">
        <h2>Badges and Achievements</h2>
    </div>
    <div class="card-body">
        <!-- Sample Achievements -->
        <div class="achievement">
            <i class="fas fa-heart fa-3x"></i>
            <p>Most Liked Post</p>
        </div>

        <div class="achievement">
            <i class="fas fa-users fa-3x"></i>
            <p>Most Users Interacted With</p>
        </div>

        <div class="achievement">
            <i class="fas fa-clock fa-3x"></i>
            <p>Longest Screen Time</p>
        </div>

        <!-- Add more achievements as needed -->
    </div>
</div>


    </div>
@endsection


