<?php

Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('posts', 'PostsController');
// Route::get('/posts/{id}/edit', 'PostsController@edit');