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
   Route::resource('products','ProductsController',['only' => ['store','destroy','show','update']]);
   Route::match(['get','post'],'products/{id}/edit','ProductsController@edit')->name('products.edit');  
   Route::get('products/{id}/delete','ProductsController@delete_confirmation')->name('products.delete_confirmation');
  
   Route::group(['prefix' =>'users/{id}'],function() {
      Route::post('paticipate','ParticipateController@store')->name('product.participate');
      Route::delete('unparticipate','ParticipateController@destroy')->name('product.unparticipate');
      Route::get('participatings','ProductsController@participatings')->name('products.participatings');
   });
   
   Route::get('product/{id}/participants','UsersController@participants')->name('product.participants');
});

