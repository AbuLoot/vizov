<?php

// Board
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@getCall']);
Route::get('uslugi_vyzova', ['as' => 'call', 'uses' => 'IndexController@getCall']);
Route::get('uslugi_vyzova/{section}/{id}', ['as' => 'show-call', 'uses' => 'IndexController@showCall'])->where(['id' => '[0-9]+']);
Route::get('1/{post}/{id}', ['as' => 'show-post-call', 'uses' => 'IndexController@showPostCall'])->where(['id' => '[0-9]+']);

Route::get('uslugi_remonta', ['as' => 'repair', 'uses' => 'IndexController@getRepair']);
Route::get('uslugi_remonta/{section}/{id}', ['as' => 'show-repair', 'uses' => 'IndexController@showRepair'])->where(['id' => '[0-9]+']);
Route::get('2/{post}/{id}', ['as' => 'show-post-repair', 'uses' => 'IndexController@showPostRepair'])->where(['id' => '[0-9]+']);

Route::get('stroymaterialy', ['as' => 'materials', 'uses' => 'IndexController@getMaterials']);
Route::get('stroymaterialy/{section}/{id}', ['as' => 'show-materials', 'uses' => 'IndexController@showMaterials'])->where(['id' => '[0-9]+']);
Route::get('3/{post}/{id}', ['as' => 'show-post-materials', 'uses' => 'IndexController@showPostMaterials'])->where(['id' => '[0-9]+']);

// Search tools
Route::get('search', ['uses' => 'IndexController@searchPosts']);
Route::get('filter', ['uses' => 'IndexController@filterPosts']);

// Profile
Route::get('profile/{id}', ['uses' => 'ProfileController@getProfile']);
Route::get('profiles', ['uses' => 'ProfileController@getProfiles']);

// Comment
Route::post('review', ['uses' => 'CommentController@saveReview']);
Route::post('comment', ['uses' => 'CommentController@saveComment']);

Route::group(['middleware' => 'auth'], function()
{
	Route::resource('posts', 'PostsController');

	Route::get('my_posts', ['uses' => 'ProfileController@getMyPosts']);

	Route::get('my_profile', ['uses' => 'ProfileController@getMyProfile']);
	Route::get('my_profile/edit', ['uses' => 'ProfileController@editMyProfile']);
	Route::post('my_profile/{id}', ['uses' => 'ProfileController@postMyProfile']);

	Route::get('my_setting', ['uses' => 'ProfileController@getMySetting']);
	Route::post('reset_password', ['as' => 'reset-password', 'uses' => 'ProfileController@postResetPassword']);
	Route::post('delete_account', ['as' => 'delete-account', 'uses' => 'ProfileController@postDeleteAccount']);
});

// Pages
Route::get('{page}', ['uses' => 'PagesController@page']);

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function()
{
    Route::resource('users', 'AdminUsersController');
    Route::resource('section', 'AdminSectionController');
    Route::resource('posts', 'AdminPostsController');
    Route::resource('pages', 'AdminPagesController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

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

