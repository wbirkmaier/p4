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
            return View::make('indexFeed');
        }
    
    /*Section to create a new feed in database*/
    public function customizeFeed()
        {
            if (Auth::check())
                {
                    $feeds = Feed::all();
                    return View::make('customizeFeed', compact('feeds'));
                }
            else
                {
                    return Redirect::to('/login')->with('flash_message', 'Please Login.');
                }

            return Redirect::to('/login');
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
        
            return Redirect::action('IndexController@customizeFeed');
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

            return Redirect::action('IndexController@customizeFeed');
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
            
            return Redirect::action('IndexController@customizeFeed');
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
            $user->given = Input::get('given');
            $user->sur = Input::get('sur');
            $user->email = Input::get('email');
        
            /*Get post data from submitted page to verify password*/
            $postVerify = Input::get('verifyPass');

            if (Hash::check( $postVerify, $user->password ))
                {
                    $user->save();
                    return Redirect::to('/')->with('flash_message', 'Account Created Succesfully.');
                }
        
            else
                {
                    return Redirect::to('/register')
                        ->with('flash_message', 'Paswords do not match, please fix')
                        ->withInput();
                }
                
        }

    /*Section to Log user in*/
	public function getLogin()
        {
            return View::make('login');
        }

    public function postLogin()
        {
            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Invalid Email or Password, Please Try Again');
            }

            return Redirect::to('/login');
        }

    /*Section to log user out*/
	public function getLogout()
        {
            Auth::logout();
            return Redirect::to('/')->with('flash_message', 'You are logged out.');
        }

}
