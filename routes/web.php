<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowUserController;
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
    return view('posts/front');
})->middleware(['auth', 'verified']);

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts/create','create')->name('create');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/index','index')->name('index');
    Route::get('/posts/{post}','show')->name('show');
    Route::get('/posts/{post}/post_edit','edit')->name('edit');
    Route::put('/posts/{post}','update')->name('update');
    Route::delete('/posts/{post}','delete')->name('delete');
});

//Route::post('/posts', 'temporary_store')->name('temporary_store');

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
    Route::get('/categories/{category}','index')->name('feel');
});

Route::controller(LikeController::class)->middleware(['auth'])->group(function(){
    Route::get('posts/{post}/like','like')->name('like');
    Route::get('posts/{post}/unlike','unlike')->name('unlike');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts/{post}/comment_store', 'comment_store')->name('comment_store');
    Route::get('/posts/{post}/comment_index','comment_index')->name('comment_index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::patch('/profile/edit', 'update')->name('profile.update');
    Route::delete('/profile/edit', 'destroy')->name('profile.destroy');
    Route::post('/profile/edit', 'store')->name('profile.store');
    Route::get('/profile/{profile}','index')->name('profile.index');
    //Route::get('/profile/{id}','other_index')->name('other.profile.index');
    Route::put('/profile/edit', 'profile_update')->name('profile_update');
});

Route::controller(FollowUserController::class)->middleware(['auth'])->group(function(){
    Route::get('profile/{user}/follow','follow')->name('follow');
    Route::get('profile/{user}/unfollow','unfollow')->name('unfollow');
});

require __DIR__.'/auth.php';
