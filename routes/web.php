<?php

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

Route::post('/', 'HomeController@FirstRequest');
Route::get('/', 'HomeController@FirstRequest')
->middleware('authen');

Route::get('/login', function(){
	return view('authentication.login');
})
->middleware('logged');

Route::match(['GET','POST'], '/registration', 'RegController@RegRequest')
->middleware('logged');