<?php

use App\Contact;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/calendar','ShowController@index');
Route::post('/contact/delete', 'ContactController@delete');
Route::post('/contact/update', 'ContactController@update');
Route::post('/contact/create', 'ContactController@create');
Route::get('/contacts', 'ContactController@read');

Route::get('/home', function(){
    return view('home');
});

Route::get('/chat', function(){
    return view('chat');
});

Route::get('/cat', function(){
    return 'cat';
});
Route::get('/poop', function(){
    return 'cat poop';
});
Route::get('/users', function(){
    dd(auth()->user());
    return App\User::all();
});

Route::get('/seed', function(){
	 Contact::create([
            "gender"=>"neutral",
            "name" => "harold"."_seed",
    		"name"=> "boby smith",
    		"nickname"=>"bobbert", 
            "email" => str_random(10).'@gmail.com', 
            "owner"=>"1",
    		"phone"=>"512-332-9898",
    		"job"=>"pipe fitter",
    		"disabilities"=> "blind",
        ]);
	});

Auth::routes();

Route::get('/home', 'HomeController@index');
