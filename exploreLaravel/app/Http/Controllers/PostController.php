<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }
    //Take the id from URL and get the related post and pass it to the function
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        //If the file exists then store method will save the file in a dir called
        //storage/app/images
        if($request->post_image)
        {
            $validated['post_image'] = $request->post_image->store('images');
        }

        auth()->user()->posts()->create($validated);

        return redirect()->route('post.index');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        //If the file exists then store method will save the file in a dir called
        //storage/app/images
        if($request->post_image && $post->post_image != $request->post_image)
        {
            $validated['post_image'] = $request->post_image->store('images');
        }

//        auth()->user()->posts()->update($validated);
        $post->update($validated);

        return back();
    }

    public function destroy(Post $post)
    {
       $post->delete();
       return redirect()->route('post.index');
    }
}
