<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/photos');
});

// Rute umum
Route::get('/photos', [PhotoController::class, 'index']);
Route::get('/albums', [AlbumController::class, 'index']);


// Rute untuk pengguna tamu
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('forgot-password', [ForgotPasswordController::class, 'index']);
});

// Rute untuk pengguna yang sudah terautentikasi
Route::group(['middleware' => ['auth', 'nocache']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/photos', PhotoController::class)->except(['index']);
    Route::post('/photos/{photo}/like', [LikeController::class, 'like']);
    Route::post('/photos/{photo}/comment', [CommentController::class, 'post_comment']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy')->withoutMiddleware('nocache');
    Route::resource('/albums', AlbumController::class)->except(['index', 'destroy', 'edit']);
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
    Route::get('/u/{user:username}', [ProfileController::class, 'index']);
    Route::get('/u/{user:username}/albums', [ProfileController::class, 'albums']);
    Route::get('/u/{user:username}/likes', [ProfileController::class, 'likes']);
    Route::get('/change-password', [ChangePasswordController::class, 'index']);
    Route::get('/photos/{id}/download', [PhotoController::class, 'download'])->name('photos.download');
    Route::get('/photos/{id}/print', [PhotoController::class, 'print'])->name('photos.print');
    Route::post('/change-password', [ChangePasswordController::class, 'store']);
});

// Rute untuk admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD Album
    Route::get('/admin/albums', [AdminController::class, 'index'])->name('admin.albums.index');
    Route::get('/admin/albums/create', [AdminController::class, 'create'])->name('admin.albums.create');
    Route::post('/admin/albums', [AdminController::class, 'store'])->name('admin.albums.store');
    Route::get('/admin/albums/{album}/edit', [AdminController::class, 'edit'])->name('admin.albums.edit');
    Route::put('/admin/albums/{album}', [AdminController::class, 'update'])->name('admin.albums.update');
    Route::delete('/admin/albums/{id}', [AlbumController::class, 'destroy'])->name('admin.albums.destroy');

    // UNTUK NGATUR POSTINGAN
    Route::get('/admin/posts', [AdminController::class, 'managePosts'])->name('admin.posts.index');
    Route::delete('/admin/posts/{id}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');
});