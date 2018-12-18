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

// Route::resource('imagepages', 'ImagepagesController');
Route::get('infos/createparag', 'InfosController@createparag')->name('infos.createparag');

	Route::post('infos/storeparag', 'InfosController@storeparag')->name('infos.storeparag');

Auth::routes();

Route::get('/admin', 'AdminController@admin')
	->middleware('is_admin')
    ->name('admin');

Route::group(['middleware'=>'is_admin'],function(){

	Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('intros','IntrosController');
	Route::resource('videos','VideosController');
	Route::resource('albums', 'AlbumsController');
	// Route::resource('imagepages', 'ImagepagesController');
	// Route::get('/albums/create/{id}', 'ImagepagesController@create')->name('createImage');
	// Route::post('/albums/create', 'ImagepagesController@store')->name('storeImage');
	// Route::put('/albums/create/{albumid}/{imageid}', 'ImagepagesController@edit')->name('editImage');
	Route::resource('musics', 'MusicsController');
	Route::resource('events', 'EventsController');
	Route::resource('infos', 'InfosController');
	
	// Route::put('infos/updatetmp/', 'InfosController@updatetmp')->name('infos.updatetmp');
	// Route::get('infos/edittmp/', 'InfosController@edittmp')->name('infos.edittmp');

	Route::get('infos/detimg/{id}', 'InfosController@showimage');

	Route::get('infos/cat/{id}', 'InfosController@manageCategoryinfo');

	Route::post('infos/addcategory', 'InfosController@addCategoryinfo')->name('infos.addcategory');

	Route::put('infos/paragraph/{id}', 'InfosController@updateparag')->name('infos.updateparag');

	Route::post('infos/paragraph', 'InfosController@storeparag')->name('infos.storeparag');

	Route::get('infos/paragraph/edit/{id}', 'InfosController@editparag')->name('infos.editparag');
	Route::put('infos/paragraph/create', 'InfosController@createparagraph')->name('infos.createparagraph');
	Route::get('infos/paragraph/{id}/create', 'InfosController@ajoutcreateparagraph')->name('infos.ajoutcreateparagraph');
	
	// Route::get('infos/createparag', 'InfosController@createparag')->name('infos.createparag');

	// Route::post('infos/storeparag', 'InfosController@storeparag')->name('infos.storeparag');

	// Route::get('/infos/create/subcategoryinfo', 'InfosController@manageCategoryinfo');

	// Route::post('/infos/create/subcategoryinfo', 'InfosController@addCategoryinfo');

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::view('/welcome', 'single');

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
