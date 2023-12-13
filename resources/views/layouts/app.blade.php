<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Title')</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add this in the head section of your HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Include your stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/liked.css') }}">
    <link rel="stylesheet" href="{{ asset('css/medialinks.css') }}">

    <!-- Add CSRF token for AJAX requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <!-- Dark blue dashboard on the left -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="fas fa-users"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">
                                <i class="fas fa-file-alt"></i> Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('comments.index') }}">
                                <i class="fas fa-comments"></i> Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.index') }}">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('newpost.create') }}">
                                <i class="fas fa-pen-square"></i> Create Post
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main content section -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!-- Toolbar at the top -->
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <span class="navbar-brand">
                            <i class="fas fa-pen-nib"></i> GuestPost
                        </span>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search input" id="searchInput">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="searchUser()">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <!-- Profile icon and name on the far right -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Add dropdown menu items (e.g., Logout) if needed -->
                                @auth
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include jQuery before your custom script -->

    <!-- Include any additional scripts or libraries if needed -->
    <!-- Include jQuery -->

<!-- Your custom script -->
<script src="{{ asset('js/like.js') }}"></script>
<script src="{{ asset('js/comment.js') }}"></script>
<script>
        function searchUser() {
            var searchTerm = document.getElementById('searchInput').value;
            if (searchTerm.trim() !== "") {
                window.location.href = "{{ route('user.show', ':username') }}".replace(':username', searchTerm);
            }
        }
    </script>


</body>
</html>
