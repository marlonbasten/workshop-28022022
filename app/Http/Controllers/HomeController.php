<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('likes')->get();

//        $token = auth()->user()->createToken('API Token Nummer 1', ['post:list']);
//
//        dd($token->plainTextToken);

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
