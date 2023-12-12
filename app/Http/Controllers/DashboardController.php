<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with(['posts', 'comments'])->get();

        return view('dashboard', compact('users'));
    }
}

