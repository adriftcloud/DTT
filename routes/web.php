<?php


Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/threads', 'ThreadController@index');
