<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'MainController@showIndex');

Route::get('/user/register', 'UserController@getRegister');
Route::post('/user/register', ['before' => 'csrf', 'uses' => 'UserController@postRegister']);

Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin']);

Route::get('/user/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout']);

Route::get('/debug', 'DebugController@getDebug');

/*Default catch all view for wrong routes*/
App::missing(function($exception)
{
        return View::make('oops');
});
