<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

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
});

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
