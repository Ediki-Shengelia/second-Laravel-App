<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;

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
    Route::post('/user.photo', [ProfileController::class, 'photo_upload_of_user'])->name('user.photo.upload');
    Route::post('like/{home}/add', [LikeController::class, 'toggleLikeFunc'])->name("like");
    Route::post('comment/{home}/add', [\App\http\Controllers\CommentController::class, 'commentStore'])->name("comment.store");
    // Route::get('comment',[\App\http\Controllers\CommentController::class,'index'])->name('comment.index');
});
Route::resource('home', \App\Http\Controllers\HomeController::class);


Route::post('read/{id}', function ($id) {
    auth()->user()
        ->notifications
        ->where('id', $id)
        ->markAsRead();
    return back();
})->name('read.one');

Route::post('read.all', function () {
    auth()->user()
        ->unreadNotifications
        ->markAsRead();
    return back();
})->name('read.all');

require __DIR__ . '/auth.php';
