<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/category/{id}', [PostController::class, 'index'])->name('posts.index');

//Admin
Route::prefix('admin')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index');
        //Xóa
        Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
