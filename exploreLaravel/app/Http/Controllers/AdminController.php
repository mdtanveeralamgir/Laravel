<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        //Now to visit any method in this cass the user needs to have
        //admin permission
        $this->middleware('isAdmin');
    }

    public function index()
    {
        return "The place for admins only";
    }
}
