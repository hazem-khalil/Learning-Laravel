<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request())
            ->get();

    	return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {  
        return view('posts.show', compact('post', 'archives'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {	
    	$this->validate(request(), [
    		'title' => 'bail|required',
    		'body' => 'required',
    	]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your Post has been published');

    	return redirect('/');
    }

}
