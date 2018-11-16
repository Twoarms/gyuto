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

Auth::routes();

Route::get('/admin', 'AdminController@admin')
	->middleware('is_admin')
    ->name('admin');

Route::group(['middleware'=>'is_admin'],function(){

	Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('intros','IntrosController');
	Route::resource('videos','VideosController');
	Route::resource('images', 'ImagesController');
	Route::resource('musics', 'MusicsController');
	Route::resource('events', 'EventsController');
	Route::resource('infos', 'InfosController');
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

});

Route::get('/', function() {
	if(Auth::guest())
	{
		return Redirect::to('login');		
	}
	if(Auth::check())
	{
		return redirect()->route('home');
	}

});	
