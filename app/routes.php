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

Route::model('feed', 'Feed');

/*Main Route for Dashboard */
Route::get('/', 'IndexController@showIndex');

/*Routes for Creating new RSS Feed Database Entry*/
Route::get('/createFeed', 'IndexController@createFeed');
Route::post('/createFeed', 'IndexController@postCreateFeed');

/*Route to change RSS Feeds in Database*/
Route::get('/change/{feed}', 'IndexController@changeFeed');
Route::post('/change', 'IndexController@postChangeFeed');

/*Route do allow a user to delete RSS Feeds in Database*/
Route::get('/delete/{feed}', 'IndexController@deleteFeed');
Route::post('/delete', 'IndexController@postDeleteFeed');

/*Route to Register a User*/
Route::get('/register', 'IndexController@getRegister');
Route::post('/register', ['before' => 'csrf', 'uses' => 'IndexController@postRegister']);

/*Route to Allow User to Login*/
Route::get('/login', 'IndexController@getLogin');
Route::post('/login', ['before' => 'csrf', 'uses' => 'IndexController@postLogin']);

/*Route to Logout a User*/
Route::get('/logout', 'IndexController@getLogout');

/*Debug Route*/
Route::get('/debug', ['before' => 'auth.basic', 'uses' => 'DebugController@getDebug']);

/*Default catch all view for wrong routes*/
App::missing(function($exception)
{
        return View::make('oops');
});
