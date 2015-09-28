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


/**
 * Home Route
 */
Route::get('/', [
	'uses' => '\Chatty\Http\Controllers\HomeController@index',
	'as'   => 'home',
]);



/**
 * Authentication
 */
Route::get('/signup', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignup',
	'as'   => 'auth.signup',
	'middleware' => ['guest'],
]);
Route::post('/signup', [
	'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest'],
]);



Route::get('/signin', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignin',
	'as'   => 'auth.signin',
	'middleware' => ['guest'],
]);
Route::post('/signin', [
	'uses' => '\Chatty\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
]);



Route::get('/signout', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignout',
	'as'   => 'auth.signout',
]);



/**
 * SEARCH
 */
Route::get('/search', [
	'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
	'as'   => 'search.results',
]);



/**
 * USER PROFILE
 */
// show profile
Route::get('/user/{username}', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
	'as'   => 'profile.index',
]);

// edit the user's profile
Route::get('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
	'as'   => 'profile.edit',
	'middleware' => 'auth',
]);
Route::post('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
	'middleware' => 'auth',
]);




