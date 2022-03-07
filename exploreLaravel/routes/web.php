<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Video;
use App\Models\Tag;

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

//One to One Relation

//User Has post
Route::get('/user/post/{id}', function($id){
   return User::find($id)->post->title;
});

//Post belongs to user
Route::get('post/user/{id}', function($id){
    return Post::find($id)->user;
});

//One to many

//All the posts of a user
Route::get('/posts', function(){
    //find the user with id 1
    $user = User::find(1);

    foreach($user->posts as $post)
    {
       echo $post->title . "<br>";
    }

});

//Many to many relationship
Route::get('/user/role/{id}', function($id){
    return User::find($id)->roles;
});

Route::get('/user/pivot', function(){
    $user = User::find(1);

    foreach($user->roles as $role)
    {
        echo $role->pivot->created_at;
    }
});
Route::get('/country', function(){
    $country = Country::find(4)->posts;

    return $country[0];
});

//Polymorphic Relationships
//One to one

//get the photo belongs to a post
Route::get('/post/photo', function(){
    $postPhoto = Post::find(1)->photo;
    return $postPhoto;
});
//get the photo belongs to a user
Route::get('/user/photo', function(){
    $userPhoto = User::find(1)->photo;
    return $userPhoto;
});
//get the post/user has a photo
Route::get('/photo', function(){
    $photo = Photo::find(3)->imageable;
    return $photo;
});

//one to many
Route::get('/post/comment', function(){
    return Post::find(1)->comment;
});
Route::get('/user/comment', function(){
    return User::find(1)->comment;
});
Route::get('/comment', function(){
    return Comment::find(3)->commentable;
});
//One of many
//latest photo
Route::get('/latestphoto', function(){
    return User::find(2)->latestPhoto;
});
//Oldest photo
Route::get('/oldestphoto', function(){
    return User::find(1)->oldestPhoto;
});

//Many to Many
Route::get('/post/tag', function(){
    return Post::find(1)->tags;
});
Route::get('/video/tag', function(){
    return video::find(1)->tags;
});
Route::get('/tag', function(){
    
});
