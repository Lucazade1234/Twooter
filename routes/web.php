<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController; 
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/feed', [PostController::class, 'index'])->name('posts.index');

Route::get('/feed/editPost/{id}', [PostController::class, 'edit']);

Route::put('feed/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/addPost', [PostController::class, 'create']);

Route::post('/addPost/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');

Route::post('comments/{id}/addComment', [CommentController::class, 'store'])->name('comments.store');

require __DIR__.'/auth.php';