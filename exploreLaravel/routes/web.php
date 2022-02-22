<?php

use Illuminate\Support\Facades\Route;

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

//adding a new page and setting route
Route::get('/test', function () {
    return view('testPage');
});

//returning a text instead of page
Route::get('/text', function () {
    return "A simple text";
});

//passig variables
Route::get('/var/{value}/{name}', function ($value, $name) {
    return "Hi! this is {$name}, and value is {$value}";
});

//give url a short name
Route::get('/admin/post/example', array('as' => 'admin.home', function () {
    return route('admin.home');
}));
