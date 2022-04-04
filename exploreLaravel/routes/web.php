<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts', PostsController::class);

Route::get('/getname', function(){
    $user = User::find(1);

    echo $user->name;
});

Route::get('/setname', function(){
    $user = User::find(1);
    $user->name = "shamma";
    $user->save();
    return redirect('/getname');
});