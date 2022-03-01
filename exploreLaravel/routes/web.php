<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::get('/read', [PostController::class, 'index']);
Route::get('/find/{id}', [PostController::class, 'singleData']);
Route::get('/where', [PostController::class, 'findWhere']);

//throw exception if not found
Route::get('/findfail', function(){
    $id = 3;
    //If can't be found then throw exception
    // $post = Post::findOrFail($id);

    //with constrains
    $post = Post::where('title', 'Laravel')->findOrFail($id);
    return $post;

});

//insert new entry
Route::get('/minsert', function(){
    $post = new Post;
    $post->title = 'Model in Laravel';
    $post->body = 'Its cool';
    $post->save();
});

//update an entry
Route::get('/mupdate', function(){
    //first fetch the entry
    $post = Post::find(3);
    $post->title = 'Updated by model';
    $post->body = 'Its simple';
    $post->save();
});

//Mass assignment
Route::get('/create', function(){
    Post::create(['title' => 'mass assignment', 'body' => 'inserting using mass assignment']);
});

//Update
Route::get('/update', function(){
    post::where('id', 3)->where('body', 'Its simple')->update(['title'=>'From model update', 'body'=>'Updating using model']);
});

//delete
Route::get('/delete', function(){
    $post = Post::find(7);
    $post->delete();
});

//short delete method
Route::get('/shortd ', function(){
    Post::destroy(6);

    //delete multiple records
    // Post::destroy([4,3]);

    //with condition
    Post::where('id', 2)->delete();
});

//soft delete
Route::get('/softdelete', function(){
    Post::find(3)->delete();
});

//fetch with deleted data
Route::get('/deleted', function(){
    return Post::withTrashed()->where('id', 3)->get();
});

//fetch only deleted data
Route::get('/onlytrashed', function(){
    return Post::onlyTrashed()->where('id', 3)->get();
});

//restore deleted data
Route::get('/restore', function(){
    return Post::withTrashed()->where('id', 3)->restore();
});

//delete permanently
Route::get('/forcedelete', function(){
    return Post::onlyTrashed()->where('id', 3)->forceDelete();
});