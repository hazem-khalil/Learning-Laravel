<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function store(Post $post)
	{
		$this->validate(request(),['body' => 'bail|required|min:2']);


		Comment::create([
			'body' => request('body'),
			'user_id' => auth()->id(),
			'post_id' => $post->id
		]);
		// $post->addComment(request(['body', 'user_id']));

		session()->flash('message', 'Your Comment has been published');	

		return back();
	}    
}
