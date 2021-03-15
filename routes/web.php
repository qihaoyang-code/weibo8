<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/','StaticPagesController@home')->name('home');
Route::get('/about','StaticPagesController@about')->name('about');
Route::get('/help','StaticPagesController@help')->name('help');


Route::get('signup','UsersController@create')->name('signup');


Route::resource('users','UsersController');
//| 		 GET|HEAD  | users             | users.index   | App\Http\Controllers\UsersController@index
//|        | POST      | users             | users.store   | App\Http\Controllers\UsersController@store
//|        | GET|HEAD  | users/create      | users.create  | App\Http\Controllers\UsersController@create
//|        | GET|HEAD  | users/{user}      | users.show    | App\Http\Controllers\UsersController@show
//|        | PUT|PATCH | users/{user}      | users.update  | App\Http\Controllers\UsersController@update
//|        | DELETE    | users/{user}      | users.destroy | App\Http\Controllers\UsersController@destroy
//|        | GET|HEAD  | users/{user}/edit | users.edit    | App\Http\Controllers\UsersController@edit



Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');


Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');


//密码
Route::get('password/reset',  'PasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email',  'PasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}',  'PasswordController@showResetForm')->name('password.reset');
Route::post('password/reset',  'PasswordController@reset')->name('password.update');


//微博
Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);
