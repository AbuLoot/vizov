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
Route::get('uslugi_vyzova', ['as' => 'call', 'uses' => 'IndexController@getCall']);
Route::get('uslugi_vyzova/{slug}/{id}', ['as' => 'show-call', 'uses' => 'IndexController@showCall'])->where(['id' => '[0-9]+']);
Route::get('uslugi_remonta', ['as' => 'repair', 'uses' => 'IndexController@getRepair']);
Route::get('uslugi_remonta/{slug}/{id}', ['as' => 'show-repair', 'uses' => 'IndexController@showRepair'])->where(['id' => '[0-9]+']);

Route::group(['middleware' => 'auth'], function()
{
	Route::resource('posts', 'PostsController');

	Route::get('my_posts', ['uses' => 'ProfileController@getMyPosts']);

	Route::get('my_profile', ['uses' => 'ProfileController@getMyProfile']);
	Route::get('my_profile/edit', ['uses' => 'ProfileController@editMyProfile']);
	Route::post('my_profile/{id}', ['uses' => 'ProfileController@postMyProfile']);

	Route::get('my_setting', ['uses' => 'ProfileController@getMySetting']);
	Route::post('my_setting/{id}', ['uses' => 'ProfileController@postMySetting']);
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('add_posts', function() {

    $faker = Faker\Factory::create();

    for ($i = 1; $i <= 25; $i++)
    {
    	$post = new \App\PostCall;
		$post->sort_id = $i;
    	$post->user_id = rand(3, 9);
    	$post->city_id = rand(1, 2);
    	$post->section_id = rand(1, 2);

    	$title = $faker->sentence(5);
    	$post->slug = str_slug($title);
		$post->title = $title;

    	$post->title_description = $title;
    	$post->meta_description = $faker->text(200);
    	$post->price = $faker->numberBetween($min = 1000, $max = 9000);
    	$post->deal = on;
		$post->description = $faker->text;
    	$post->images = $faker->imageUrl(300, 300, 'transport');
    	$post->address = $faker->address;
    	$post->phone = $faker->phoneNumber;
    	$post->email = $faker->email;
    	$post->save();
    }
    echo 'Allahu akbar!';
});

Route::get('update_posts', function() {

    $faker = Faker\Factory::create();

    $posts = App\PostCall::all();

    foreach ($posts as $post) {
    	$post->images = $faker->imageUrl(300, 300, 'transport');
    	$post->save();
    }

    echo 'Allahu akbar!';
});

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
		$item = new \App\SectionRepair;
    	$item->sort_id = $i++;
    	$item->slug = str_slug($value);
    	$item->title = $value;
    	$item->image = $images[$key];
    	$item->save();
    }
    echo 'Allahu akbar!';
});*/