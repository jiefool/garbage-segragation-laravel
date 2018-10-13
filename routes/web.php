<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('/')->middleware('login.checker')->group(function(){

	Route::get('/home', function(){
		return redirect('/');
	});

	Route::get('/', 'HomeController@index')->name('home');


	Route::prefix('administrator')->group(function(){

		Route::get('/new', 'UserController@index');
		Route::post('/store', 'UserController@store');
		Route::get('/list', 'UserController@list');
		Route::delete('/delete/{id}', 'UserController@destroy');
		Route::get('/edit/{id}', 'UserController@show');
		Route::post('/update', 'UserController@update');
		Route::get('/password/reset/{id}', 'UserController@password');
		Route::post('/password/update', 'UserController@passwordupdate');

	});

	Route::prefix('contact')->group(function(){

		Route::get('/new', 'ContactController@index');
		Route::post('/store', 'ContactController@store');
		Route::get('/list', 'ContactController@show');
		Route::delete('/delete/{id}', 'ContactController@destroy');
		Route::get('/edit/{id}', 'ContactController@edit');
		Route::post('/update', 'ContactController@update');

	});

	Route::prefix('about')->group(function(){

		Route::get('/', 'AboutController@index');

	});

	Route::prefix('report')->group(function(){

		Route::get('/', 'ReportController@index');
		Route::get('message', 'ReportController@message');
	});

});

Auth::routes();