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

Route::get('/', 'ReleasesController@index');
Route::get('release/{id}', 'ReleasesController@show');

Route::get('contact', 'ContactsController@index');
Route::post('contact/store', 'ContactsController@store');

//Route::get('home', 'HomeController@index');
//Route::get('pages', 'PageController@index');
//Route::get('pages/{id}', 'PageController@show');
//
//
//Route::get('articles', 'ArticleController@index');
//Route::get('article/{id}', 'ArticleController@show');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' =>Config::get('constants.ADMIN_URL'), 'namespace' => 'Admin','middleware'=>'auth' ], function()
{
    Route::get('/', 'AdminHomeController@index');
    Route::resource('pages', 'PagesController');
    Route::resource('articles', 'ArticleController');
    Route::resource('comments', 'CommentsController');
    Route::resource('releases', 'ReleasesController');
});
Route::post('comment/store', 'CommentsController@store');
