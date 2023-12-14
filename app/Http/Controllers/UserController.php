<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('posts.comments.user', 'posts.likes'); // Eager load relationships
        
        return view('show', compact('user'));
    }
    
    public function index()
    {
        $user = Auth::user();
        return view('user', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $profile = $user->profile;

        $profile->fill($request->validated());

        if ($profile->isDirty('email')) {
            $profile->email_verified_at = null;
        }

        $profile->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(): RedirectResponse
    {
        $user = Auth::user();
        $profile = $user->profile;

        $profile->delete();

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'account-deleted');
    }

    public function likedPosts()
    {
        $likedPosts = auth()->user()->likedPosts;

        return view('likedpost', compact('likedPosts'));
    }

    public function likedComments()
    {
        $likedComments = auth()->user()->likedComments;

        return view('likedcomment', compact('likedComments'));
    }
    

}

