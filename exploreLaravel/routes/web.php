<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\User;

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

Route::get('/dates', function(){
    $date = new DateTime('+1 week');
    echo $date->format('d-m-y') . '<br>';
    echo Carbon::now()->diffForHumans();
});


Route::get('/getname', function(){
    $user = User::find(1);

    echo $user->name;
});