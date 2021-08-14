<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


// Home Page
Route::get('/', function (){
    return view('home');
})->name('home');


// Register Controller
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login Controller
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Login Controller
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Posts
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

// Likes
Route::post('/posts/{post}/likes', [LikesController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [LikesController::class, 'destroy'])->name('posts.like');

// User Post
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');
Route::get('/users/{user:username}/profile', [UserPostController::class, 'profile'])->name('users.profile');

// User Profile
// Dasboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');


