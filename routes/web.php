<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});

//Post 
Route::get('create-post', [PostController::class, 'create']);
Route::get('store-post', [PostController::class, 'store']);
Route::get('index-post', [PostController::class, 'index']);

//Actions
Route::get('destroy-post/{post}', [PostController::class, 'destroy']);
Route::get('edit-post/{post}', [PostController::class, 'edit']);
Route::get('update-post/{post}', [PostController::class, 'update']);



//comment
Route::get('create-comment', [CommentController::class, 'create']);
Route::get('store-comment', [CommentController::class, 'store']);
Route::get('index-comment', [CommentController::class, 'index']);





Route::get('/post/{slug}',[PostController::class,'show']);


Route::get('/dashboard', function () {
    return view('post/create');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
