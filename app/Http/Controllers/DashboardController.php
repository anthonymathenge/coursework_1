<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        // Assuming 10 posts per page, adjust as needed
        $users = User::with('posts.comments.user')->paginate(10);

        return view('dashboard', compact('users'));
}
}

