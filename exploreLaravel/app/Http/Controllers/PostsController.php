<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function contact()
    {
        return view('contact');
        //Path to contact page inside pages directory
        // return view('pages.contact');
        //or
        // return view('pages/contact');
    }

    public function showPost($id, $name)
    {
        //one way to pass the id to view
        //return view('post')->with('id', $id);

        //With below way we can pass multiple variables
        //the param name passed in the showPost function has to match with the param passing in view
        return view('post', compact('id', 'name'));
    }
}
