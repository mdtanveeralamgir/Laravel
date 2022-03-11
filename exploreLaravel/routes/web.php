<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;

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


//ONE TO ONE

//insert data
Route::get('/insert', function(){
    $user = User::find(1);
    $address = new Address(['full_address' => '3600 rue ovide']);

    $user->address()->save($address);
});

//update data
Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();
    // or
    // $address = Address::where('user_id', 1)->get();
    //or
    // $address = Address::where('user_id', '=', 1)->get();
    $address->full_address = "5510 Ave robinson";
    $address->save();
});
    
//fetching data
Route::get('/fetch', function(){
    $user = User::findOrFail(1);
    echo $user->address->full_address;
    
});
//deleting data
Route::get('/delete', function(){
    $user = User::findOrFail(1);
    $user->address()->delete();
});

//ONE TO MANY

//Inserting
Route::get('/create', function(){
    $user = User::findOrFail(1);
    $post = new Post(['title' => 'CURD', 'body'=>'CURD relationship']);
    $user->posts()->save($post);
});
//fetching
Route::get('/fetch', function(){
    //returnes all the post for user 1
    // $post = Post::whereUserId(1)->get();
    // echo $post[0]->title;
    //or
    $user = User::findOrFail(1);
    return $user->posts;
    //or
    //returns the first post for user 1
    // $post = Post::whereUserId(1)->first();
    // echo $post->title;
    //or

    
});
//Update
Route::get('/mupdate', function(){
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->update(['title' => 'CURD update']);
});
//Delete
Route::get('/mdelete', function(){
    $user = User::findOrFail(1);
    $user->posts()->whereId(6)->delete();
});

//MANY TO MANY
//Insert
Route::get('/mmcreate', function(){
    $user = User::find(2);
    $user->roles()->save(new Role(['name' => 'Admin']));
});
//fetch
Route::get('/mmfetch', function(){
    $user = User::findOrFail(2);
    return $user->roles;
});
//update
Route::get('/mmupdate', function(){
    $user = User::findOrFail(2);
    $user->roles()->whereName("Admin")->update(['name' => 'tech']);
});
//Delete
Route::get('/mmdelete', function(){
    $user = User::findOrFail(2);
    $user->roles()->whereName('tech')->delete();
});
//attach
Route::get('/attach', function(){
    $user = User::findOrFail(1);
    $user->roles()->attach(2);
});
//detach
Route::get('/detach', function(){
    $user = User::findOrFail(1);
    $user->roles()->detach(2);
});
//sync
Route::get('/sync', function(){
    $user = User::findOrFail(1);
    $user->roles()->sync([2,3]);
});

//Relational DB polymorphic CURD One to many
//Insert
Route::get('/pinsert', function(){
    $staff = Staff::find(1);
    $staff->photos()->create(['path'=>'example.jpg']);
});
//fetch
Route::get('/pfetch', function(){
    $staff = Staff::find(1);
    return $staff->photos;
});
//update
Route::get('/pupdate', function(){
    $staff = Staff::find(1);
    $staff->photos()->whereId(5)->update(['path' => 'example3.jpg']);
});
//Delete
Route::get('/pupdate', function(){
    $staff = Staff::find(1);
    $staff->photos()->whereId(5)->delete();
});
//Assign
Route::get('/assign', function(){
    $staff = Staff::find(1);
    $photo = Photo::find(6);
    $staff->photos()->save($photo);
});

//Relational DB polymorphic CURD Many to many

//insert
Route::get('/mmpinsert', function(){
    $post = Post::create(['user_id' => 1, 'title' => 'polymorphic', 'body' => 'mm poly']);
    $tagPost = Tag::find(3);
    $post->tags()->save($tagPost);
    $video = Video::create(['name' => 'insert mm p']);
    $tagVideo = Tag::find(4);
    $video->tags()->save($tagVideo);

});

//Fetch
Route::get('/mmpfetch', function(){
    $post = Post::findOrFail(21);
    return $post->tags;
});
//update
Route::get('/mmpupdate', function(){
    $post = Post::findOrFail(21);
    $post->tags()->update(['name' => 'updated']);
});
