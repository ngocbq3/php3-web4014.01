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
        //Thêm mới
        Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::post('/create', [AdminPostController::class, 'store'])->name('admin.posts.store');
        //Cập nhật
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/edit/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    });
});
