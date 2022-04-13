<?php

use Illuminate\Support\Facades\Mail;
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
    $data = [
      'title' => 'Hi There',
      'body' => 'Hope you are enjoying the course',
    ];

    Mail::send('emails.test', $data, function($message){
        $message->to('mdtanveeralamgir@gmail.com', 'Tanveer')->subject('From laravel');
    });
});
