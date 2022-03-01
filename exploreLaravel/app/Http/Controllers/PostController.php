<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //fetching all data
    public function index()
    {
        //This will fetch all the data from table 'posts'
        $posts = Post::all();
        return view('test', compact('posts'));
    }
    //fetching data by variable
    public function singleData($id)
    {
        //This will fetch a single data from table 'posts'
        $post = Post::find($id);
        return view('test', compact('post'));
    }
    //fetching with condition (constrains)
    public function findWhere()
    {
        //Will return all match
        $posts = Post::where('title', 'Laravel')->orderBy('id', 'asc')->get();
        //will return only one result
        // $posts = Post::where('title', 'Laravel')->orderBy('id', 'asc')->take(1)->get();
        return view('test', compact('posts'));
    }
}
