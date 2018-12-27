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
	Route::resource('albums', 'AlbumsController');
	Route::resource('musics', 'MusicsController');
	Route::resource('events', 'EventsController');
	Route::resource('infos', 'InfosController');
	Route::get('infos/detimg/{id}', 'InfosController@showimage');
	Route::get('infos/cat/{id}', 'InfosController@manageCategoryinfo');
	Route::post('infos/addcategory', 'InfosController@addCategoryinfo')->name('infos.addcategory');
	Route::put('infos/paragraph/{id}', 'InfosController@updateparag')->name('infos.updateparag');
	Route::post('infos/paragraph', 'InfosController@storeparag')->name('infos.storeparag');
	Route::get('infos/paragraph/edit/{id}', 'InfosController@editparag')->name('infos.editparag');
	Route::put('infos/paragraph/create', 'InfosController@createparagraph')->name('infos.createparagraph');
	Route::get('infos/paragraph/{id}/create', 'InfosController@ajoutcreateparagraph')->name('infos.ajoutcreateparagraph');
	Route::get('musics/{id}/albummusic/create', 'MusicsController@creationalbum')->name('musics.creationalbum');
	Route::put('musics/albummusic/create', 'MusicsController@createalbum')->name('musics.createalbum');
	Route::post('musics/albummusic', 'MusicsController@storealbum')->name('musics.storealbum');
	Route::get('musics/albummusic/edit/{id}', 'MusicsController@editalbum')->name('musics.editalbum');
	Route::put('musics/albummusic/{id}', 'MusicsController@updatealbum')->name('musics.updatealbum');
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
