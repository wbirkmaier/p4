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

Route::get('/', 'IndexController@showIndex');

Route::get('/register', 'UserController@getRegister');
Route::post('/register', ['before' => 'csrf', 'uses' => 'UserController@postRegister']);

Route::get('/login', 'UserController@getLogin');
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin']);

Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout']);

Route::get('/debug', 'DebugController@getDebug');

/*Default catch all view for wrong routes*/
App::missing(function($exception)
{
        return View::make('oops');
});
