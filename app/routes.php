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

Route::get('/register', 'MainController@showRegister');

Route::get('/login', 'MainController@showLogin');

/*Default catch all view for wrong routes*/
App::missing(function($exception)
{
        return View::make('oops');
});
