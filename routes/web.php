<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

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
    // Add more post routes (create, edit, delete) as needed

    // Comments
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    // Add more comment routes (create, edit, delete) as needed

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
