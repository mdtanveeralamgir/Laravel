<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        $request->session()->put(['Opel' => 'Coder']);
//        echo $request->session()->get('Opel');
//        echo session('Opel');

        //delete a single entry
//        $request->session()->forget('Opel');

        //delete all entries
//        $request->session()->flush();

//        return $request->session()->all();

        //temporarily display a message
//        $request->session()->flash('message', 'post has been created');

        echo $request->session()->get('message');
    }
}
