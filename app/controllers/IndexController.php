<?php

class IndexController extends BaseController {

    /*Inherit __construct method from BaseController*/
	public function __construct()
        {
            parent::__construct();
        }
        
    /*Landing page for P4*/
	public function showIndex()
        {   
            $feeds = Feed::all();
            return View::make('indexFeed', compact('feeds'));
        }
    
    /*Section to create a new feed in database*/
    public function createFeed()
        {
            return View::make('createFeed');
        }
    
    public function postCreateFeed()
        {
            $feed = new Feed;
            $feed->name = Input::get('name');
            $feed->url = Input::get('url');
            $feed->maxresults = Input::get('maxresults');
            $feed->save();  
        
            return Redirect::action('IndexController@showIndex');
        } 
    
    /*Section to change feed in database*/
    public function changeFeed(Feed $feed)
        {
            return View::make('changeFeed', compact('feed'));
        }
    
    public function postChangeFeed()
        {
            $feed = Feed::findOrFail(Input::get('id'));
            $feed->name = Input::get('name');
            $feed->url = Input::get('url');
            $feed->maxresults = Input::get('maxresults');
            $feed->save();

            return Redirect::action('IndexController@showIndex');
        }
    
    /*Section to delete feed from database*/
    public function deleteFeed(Feed $feed)
        {
            return View::make('deleteFeed', compact('feed'));
        }
    
    public function postDeleteFeed()
        {
            $id = Input::get('feed');
            $feed = Feed::findOrFail($id);
            $feed->delete();
            
            return Redirect::action('IndexController@showIndex');
        }
    
    /*Section to Register New User*/
    public function getRegister()
        {
            return View::make('register');
        }

	public function postRegister()
        {
            $user = new User;
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->save();
            
            return Response::make('Account Created Succesfully.');
            
        
            /*Get post data from submitted page to verify password
            $postVerify = Input::get('verifyPass');

            if (Hash::check( $postVerify, $user->password ))
                {
                    $user->save();
                    return Response::make('Account Created Succesfully.');
                }
        
            else
                {
                    return Redirect::to('/register')
                        ->with('flash_message', 'Paswords do not match, please fix')
                        ->withInput();
                }
                */
        }

    /*Section to Log user in*/
	public function getLogin()
        {
            return View::make('login');
        }

    public function postLogin()
        {
            return View::make('login');
        }

    /*Section to log user out*/
	public function getLogout()
        {
            Auth::logout();
            return Response::make('You are logged out');
        }

}
