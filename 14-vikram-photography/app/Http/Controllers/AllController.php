<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class AllController extends Controller
{
    public function index()
    {
        //$posts = Post::all();
        $posts = DB::select('SELECT * FROM posts WHERE status="images" ORDER by 1 DESC');
        return view('images')->with('posts', $posts);
    }

    public function youtube()
    {
        //$posts = Post::all();
        $posts = DB::select('SELECT * FROM posts WHERE status="youtube" ORDER by 1 DESC');
        return view('youtube')->with('posts', $posts);
    }
    
}
