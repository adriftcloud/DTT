<?php


Route::get('/', function ()
{
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/{thread}', 'ThreadsController@show')->name('threads.show');
Route::post('/threads/{thread}/replies', 'RepliesController@store');
