<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

//Loading contact.blade.php using controller "contact" function
Route::get('/contact', [PostsController::class, 'contact']);

//passing data to the view
Route::get('/post/{id}/{name}', [PostsController::class, 'showPost']);
