@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <div class="container mt-5">
        <div class="notification-center">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Notifications</h4>
                </div>

                <ul class="list-group list-group-flush notification-list">
                    <li class="list-group-item">
                        <div class="media">
                            <img class="mr-3 rounded-circle" alt="User Avatar" src="https://robohash.org/{name}.png" />
                            <div class="media-body">
                                <h5 class="mt-0">John Doe</h5>
                                liked your post.
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="media">
                            <img class="mr-3 rounded-circle" alt="User Avatar" src="https://robohash.org/{name}.png" />
                            <div class="media-body">
                                <h5 class="mt-0">Joe</h5>
                                commented on your post.
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection

