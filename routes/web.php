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

Route::get('/', 'ProductsController@index')->name('index.get');

//ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ユーザ機能
Route::group(['middleware' => ['auth']], function() {
   Route::get('products/create','ProductsController@create')->name('products.create');
   Route::resource('users','UsersController',['only' => ['index','show']]); 
   Route::resource('products','ProductsController',['only' => ['store','edit','destroy','show']]);
});

