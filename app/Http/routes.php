<?php

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@getIndex']);

Route::get('uslugi_vyzova', ['as' => 'call', 'uses' => 'IndexController@getCall']);
Route::get('uslugi_vyzova/{section}/{id}', ['as' => 'show-call', 'uses' => 'IndexController@showCall'])->where(['id' => '[0-9]+']);
Route::get('1/{post}/{id}', ['as' => 'show-post-call', 'uses' => 'IndexController@showPostCall'])->where(['id' => '[0-9]+']);
Route::get('uslugi_remonta', ['as' => 'repair', 'uses' => 'IndexController@getRepair']);
Route::get('uslugi_remonta/{section}/{id}', ['as' => 'show-repair', 'uses' => 'IndexController@showRepair'])->where(['id' => '[0-9]+']);
Route::get('2/{post}/{id}', ['as' => 'show-post-repair', 'uses' => 'IndexController@showPostRepair'])->where(['id' => '[0-9]+']);

Route::get('search', ['uses' => 'IndexController@searchPosts']);
Route::get('filter', ['uses' => 'IndexController@filterPosts']);

Route::get('profile/{id}', ['uses' => 'ProfileController@getProfile']);
Route::get('profiles', ['uses' => 'ProfileController@getProfiles']);

Route::post('review', ['uses' => 'IndexController@saveReview']);
Route::post('comment', ['uses' => 'IndexController@saveComment']);

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

/*Route::get('add_posts', function() {

    $faker = Faker\Factory::create();

    for ($i = 1; $i <= 20; $i++)
    {
    	$post = new \App\Post;
		$post->sort_id = $i;
    	$post->user_id = rand(5, 9);
    	$post->city_id = rand(1, 2);
    	$post->service_id = 1;
    	$post->section_id = rand(2, 3);

    	$title = $faker->sentence(5);

    	$post->slug = str_slug($title);
		$post->title = $title;
    	$post->title_description = $title;
    	$post->meta_description = $faker->text(200);
    	$post->price = $faker->numberBetween($min = 1000, $max = 9000);
    	// $post->deal = 'on';
		$post->description = $faker->text;
    	$post->address = $faker->address;
    	$post->phone = $faker->phoneNumber;
    	$post->email = $faker->email;
    	$post->save();
    }
    echo 'Allahu akbar!';
});*/

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


/*Route::get('add_section', function() {

	$sections = [
		'Ремонт авто',
		'Ремонт бытовой техники',
		'Ремонт домов и квартир',
		'Ремонт обуви',
		'Ремонт одежды',
		'Ремонт и реставрация мебели',
		'Химчистка',
	];
	$images = [
		'vehicle18.png',
		'kitchen51.png',
		'gear63.png',
		'mountain22.png',
		'winter-clothes.png',
		'sofa.png',
		'washing11.png'
	];

    $i = 1;
    foreach ($sections as $key => $value) {
		$item = new \App\Section;
    	$item->sort_id = $i++;
    	$item->service_id = 2;
    	$item->slug = str_slug($value);
    	$item->title = $value;
    	$item->image = $images[$key];
    	$item->save();
    }
    echo 'Allahu akbar!';
});*/
