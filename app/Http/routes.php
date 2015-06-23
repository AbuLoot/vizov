<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@getIndex']);
Route::get('uslugi_vyzova', ['as' => 'call', 'uses' => 'IndexController@getIndex']);
Route::get('uslugi_remonta', ['as' => 'repair', 'uses' => 'IndexController@getRepair']);

Route::group(['middleware' => 'auth'], function()
{
	Route::get('my_posts', ['uses' => 'ProfileController@getMyPosts']);
	Route::get('my_profile', ['uses' => 'ProfileController@getMyProfile']);
	Route::get('my_setting', ['uses' => 'ProfileController@getMySetting']);

	Route::post('my_profile/{id}', ['uses' => 'ProfileController@postMyProfile']);
	Route::post('my_setting/{id}', ['uses' => 'ProfileController@postMySetting']);

	Route::resource('posts', 'PostsController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*Route::get('add_cities', function() {
	
	$cities = [
		'Алматы',
		'Астана',
		'Актау',
		'Актобе',
		'Атырау',
		'Жезказган',
		'Караганда',
		'Кокшетау',
		'Костанай',
		'Кызылорда',
		'Павлодар',
		'Петропавловск',
		'Семей',
		'Талдыкорган',
		'Тараз',
		'Темиртау',
		'Уральск',
		'Усть-Каменогорск',
		'Шымкент',
		'Экибастуз'
	];

    $i = 1;
    foreach ($cities as $key => $value) {
		$city = new \App\City;
    	$city->sort_id = $i++;
    	$city->slug = str_slug($value);
    	$city->title = $value;
    	$city->save();
    }
    echo 'Allahu akbar!';
});*/