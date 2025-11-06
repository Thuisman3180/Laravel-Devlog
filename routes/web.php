<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/', [PostController::class, 'home'])->name('home');

Route::post('/', [MessageController::class, 'store'])->name('messages.store');

Route::delete('/dashboard/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::post('/dashboard/posts', [PostController::class, 'store'])->name('posts.store');

Route::delete('/dashboard/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/dashboard/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::post('/dashboard/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/dashboard/messages', [MessageController::class, 'index'])->name('messages.index');

Route::get('/The-Making-Of', [Postcontroller::class, 'making'])->name('making');

//Route::get('/dashboard', [DashboardController::class, 'editDescription'])->name('dashboard')->middleware(['auth', 'verified']);
//
//Route::put('/dashboard/description', [DashboardController::class, 'updateDescription'])->name('dashboard.description.update');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
