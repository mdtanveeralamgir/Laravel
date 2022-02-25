<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostDBController extends Controller
{
    public function index()
    {
        DB::insert('insert into post(title, body) values(?,?)', ['Laravel', 'Laravel is a PHP framework']);
         return "working";
        // echo phpinfo();
    }

    public function read($id)
    {
        $results = DB::select('SELECT * FROM post WHERE id = ?', [$id]);
        return view('test', compact("results"));
    }

    public function update($id)
    {
        $result = DB::update('UPDATE post SET title = "updated title" WHERE id = ?', [$id]);
        return $result ? "Successfully updated" : "Couldn't update";
    }

    public function delete($id)
    {
        $result = DB::delete('DELETE FROM post WHERE id = ?', [$id]);
        return $result ? "Successfully deleted" : "Couldn't delete";
    }
}
