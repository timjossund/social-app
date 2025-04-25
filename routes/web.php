<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowController;

//users
Route::get('/', [UserController::class, "showCorrectHomePage"])->name('login');
// Route::post('/register', [UserController::class, "register"])->middleware('guest');
// Route::post('/login', [UserController::class, "login"])->middleware('guest');
// Route::post('/logout', [UserController::class, "logout"])->middleware('auth');
Route::get('/manage-avatar', [UserController::class, "showAvatarForm"])->middleware('auth');
Route::post('/manage-avatar', [UserController::class, "saveAvatar"])->middleware('auth');

//posts
Route::get('/create-post', [PostController::class, "showCreateForm"])->middleware('auth');
Route::post('/create-post', [PostController::class, "storeNewPost"])->middleware('auth');Route::get('/post/{post}/edit', [PostController::class, "editPost"])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, "updatePost"])->middleware('can:update,post');
Route::get('/post/{post}', [PostController::class, "showSinglePost"])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, "deletePost"])->middleware('can:delete,post');
Route::get('/search/{term}', [PostController::class, "search"])->middleware('auth');

//profiles
Route::get('/profile/{user:username}', [UserController::class, "showProfile"])->middleware('auth');
Route::get('/profile/{user:username}/followers', [UserController::class, "showProfileFollowers"])->middleware('auth');
Route::get('/profile/{user:username}/following', [UserController::class, "showProfileFollowing"])->middleware('auth');

//follows
Route::post('create-follow/{user:username}', [FollowController::class, "createFollow"])->middleware('auth');
Route::post('remove-follow/{user:username}', [FollowController::class, "removeFollow"])->middleware('auth');

//admin
Route::get('/admin-dashboard', [AdminController::class, "adminDash"])->middleware('can:visitAdminPages');