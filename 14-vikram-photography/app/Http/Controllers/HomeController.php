<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function allposts()
    {
        //$posts = Post::all();
        $posts = DB::select('SELECT * FROM posts ORDER by 1 DESC');
        return view('allposts')->with('posts', $posts);
    }

    public function bookingposts()
    {
        //$posts = Post::all();
        $posts = DB::select('SELECT * FROM bookings ORDER by 1 DESC');
        return view('bookingposts')->with('posts', $posts);
    }
}
