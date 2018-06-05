<?php

use App\Http\Middleware\IsAdmin;

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
Route::get('/profiles', 'ProfilesController@index')->name('profiles');

//Login routes
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login')->name('login');


Route::get('/me/profile', 'MeController@index')->name('me.profile');
Route::put('/me/profile', 'MeController@update')->name('me.profile');



Route::get('/me/associates', 'MeController@associates')->name('me.associates');
Route::get('/me/associate-of', 'MeController@associateof')->name('me.associate-of');


Route::post('/account', 'AccountController@store')->name('account');
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/accounts/{user}', 'AccountController@accounts_user')->name('accounts/{user}');

Route::get('/accounts/{user}/opened', 'AccountController@accounts_user_open')->name('accounts/{user}/opened');
Route::get('/accounts/{user}/closed', 'AccountController@accounts_user_closed')->name('accounts/{user}/closed');


Route::patch('/account/{account}/close', 'AccountController@account_user_close');
Route::patch('/account/{account}/reopen', 'AccountController@account_user_reopen');

Route::delete('/account/{account}', 'AccountController@account_user_delete');


Route::get('/account/{account}', 'AccountController@edit')->name('account.{account}');
Route::put('/account/{account}', 'AccountController@update')->name('account.{account}');



Route::get('/movements/{account}', 'MovementController@index')->name('movements.{account}');
Route::get('/movements/{account}/create', 'MovementController@create')->name('movements.{account}.create');
Route::post('/movements/{account}/create', 'MovementController@store')->name('movements.{account}.create');
Route::get('/movement/{movement}', 'MovementController@edit')->name('movement.{movement}');
Route::put('/movement/{movement}', 'MovementController@update')->name('movement.{movement}');
Route::delete('/movement/{movement}', 'MovementController@delete')->name('movement.{movement}');

//rotas admin 
//Route::get('/users','ProfilesController@index')->middleware('admin');
Route::get('/users','AdminController@index')->name('users');
Route::patch('/users/{user}/block','AdminController@block')->name('users.{user}.block');
Route::patch('/users/{user}/unblock','AdminController@unblock')->name('users.{user}.unblock');
Route::patch('/users/{user}/promote','AdminController@promote')->name('users.{user}.promote');
Route::patch('/users/{user}/demote','AdminController@demote')->name('users.{user}.demote');




/*Route::get('account/{user}', 'AccountController@index')->name('accounts{user}');
Route::get('account/{user}/opened', 'AccountController@index')->name('accounts{user}');
Route::get('account/{user}/closed', 'AccountController@index')->name('accounts{user}');
Route::delete('account/{closed}', 'AccountController@index')->name('accounts{user}');
Route::patch('account/{closed}/close', 'AccountController@index')->name('accounts{user}');
Route::patch('account/{closed}/reopen', 'AccountController@index')->name('accounts{user}');
Route::post('account', 'AccountController@index')->name('accounts{user}');
Route::put('account/{closed}', 'AccountController@index')->name('accounts{user}');
//Route::get('profiles', 'ProfilesController@index')->name('profiles');
//Route::get('profiles', 'ProfilesController@index')->name('profiles');*/





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
