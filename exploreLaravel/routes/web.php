<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//passing variables into controller
//only one variable can be passed
// Route::get('/post/{id}', [PostsController::class, 'index']);

//creating CRUD route all together
Route::resources([
    'posts' => PostsController::class,
]);

