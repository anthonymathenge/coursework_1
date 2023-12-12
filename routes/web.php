<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
 
    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Add this line
    Route::post('/like/post/{post}', [LikeController::class, 'likePost'])->name('like.post');
    // Add more post routes (create, edit, delete) as needed

    // Comments
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store'); // Add this line
    Route::post('/like/comment/{comment}', [LikeController::class, 'likeComment'])->name('like.comment');
    // Add more comment routes (create, edit, delete) as needed

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // routes/web.php

    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');



    Route::post('/comment/post/{post}', [CommentController::class, 'store'])->name('comment.store');
    
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/post/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::put('/post/{post}', [PostController::class,'update'])->name('post.update');

    Route::get('/comment/{comment}/edit', [CommentController::class,'edit'])->name('comment.edit');
    Route::put('/comment/{comment}', [CommentController::class,'update'])->name('comment.update');

    // web.php
    Route::get('/user/activity/likedposts', [UserController::class,'likedPosts'])->name('user.likedposts');
    Route::get('/user/activity/likedcomments', [UserController::class,'likedComments'])->name('user.likedcomments');



});

require __DIR__.'/auth.php';
