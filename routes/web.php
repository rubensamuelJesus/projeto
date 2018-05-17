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

/*Route::view('/', 'index');
Route::view('user', 'user');
Route::view('table', 'table');
Route::view('icons', 'icons');
Route::view('estatistics', 'estatistics');
Route::view('register', 'register');*/

Route::get('/','HomeController@index')->name('/');
Route::get('/table','HomeController@index')->name('/');

//Login routes
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login')->name('login');


Route::get('me/profile', 'MeController@index')->name('me.profile');
Route::put('me/profile', 'MeController@update')->name('me.profile');


Route::get('profiles', 'ProfilesController@index')->name('profiles');


Route::get('account/{user}', 'AccountController@index')->name('accounts{user}');
Route::get('account/{user}/opened', 'AccountController@index')->name('accounts{user}');
Route::get('account/{user}/closed', 'AccountController@index')->name('accounts{user}');
Route::delete('account/{closed}', 'AccountController@index')->name('accounts{user}');
Route::patch('account/{closed}/close', 'AccountController@index')->name('accounts{user}');
Route::patch('account/{closed}/reopen', 'AccountController@index')->name('accounts{user}');
Route::post('account', 'AccountController@index')->name('accounts{user}');
Route::put('account/{closed}', 'AccountController@index')->name('accounts{user}');
//Route::get('profiles', 'ProfilesController@index')->name('profiles');
//Route::get('profiles', 'ProfilesController@index')->name('profiles');





// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Logout Routes...
Route::post('logout','Auth\LoginController@logout')->name('logout');

//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
