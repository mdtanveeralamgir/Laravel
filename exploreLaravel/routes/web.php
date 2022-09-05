<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


// User needs to log in before going to any route under this function
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::put('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    Route::get('admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::get('/admin/{post}/posts', [App\Http\Controllers\PostController::class, 'edit'])->middleware('can:update,post')->name('post.edit');
    Route::delete('/admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});
