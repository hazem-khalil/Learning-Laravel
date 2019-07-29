<?php

Route::get('/', 'PostsController@index')->name('home');
Route::get('/home', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');



// user sign in
// user login
// AuthController => but this will prevent me to use 7 actions
// RegisterationController Done
// SessionsController Done
// Create Register Page Done
// create store action Done
// make confirmation password and it's validation Done
// Display errors if they exist once Registeration process Done
// flash by user name after sign in. Done

// Create a Post related to the auth user. Done
// show the creator name of the post with the post Doen
// Refactor that action to publish() method Done
// Login page
// guest