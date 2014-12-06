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
    
    /*Section to customoze feeds for main page*/
    public function customizeFeed()
        {
            if (Auth::check())
                {
                    $feeds = Feed::all();
                    return View::make('customizeFeed', compact('feeds'));
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');
                }
        }
    
    /*Section to create a new feed in database*/
    public function createFeed()
        {
            if (Auth::check())
                {
                    return View::make('createFeed');
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');
                }
        }
    
    public function postCreateFeed()
        {
            if (Auth::check())
                {
                    $user = Auth::id();
                    $feed = new Feed;
                    $feed->name = Input::get('name');
                    $feed->url = Input::get('url');
                    $feed->maxresults = Input::get('maxresults');
                    $feed->save();
                    $feed->users()->attach($user); 
        
                    return Redirect::action('IndexController@customizeFeed');
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');
                }
        } 
    
    /*Section to change feed in database*/
    public function changeFeed(Feed $feed)
        {
            if (Auth::check())
                {
                    return View::make('changeFeed', compact('feed'));
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');
                }
        }
    
    public function postChangeFeed()
        {
            if (Auth::check())
                {
                    $feed = Feed::findOrFail(Input::get('id'));
                    $feed->name = Input::get('name');
                    $feed->url = Input::get('url');
                    $feed->maxresults = Input::get('maxresults');
                    $feed->save();
            
                    return Redirect::action('IndexController@customizeFeed');
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');    
                }
        }
    
    /*Section to delete feed from database*/
    public function deleteFeed(Feed $feed)
        {
            if (Auth::check())
                {
                    return View::make('deleteFeed', compact('feed'));
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');    
                }
        }
    
    public function postDeleteFeed()
        {
            if (Auth::check())
                {
                    $user = Auth::id();
                    $id = Input::get('feed');
                    $feed = Feed::findOrFail($id);
                    $feed->users()->detach($user);
                    $feed->delete();
            
                    return Redirect::action('IndexController@customizeFeed');
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');    
                }
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
        
            $rules = array(
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3',
                'username' => 'required|unique:users,username'
            );
        
            $validator = Validator::make(Input::all(), $rules);
        
            if ($validator->fails()) 
                {
                    return Redirect::to('/register')
                    ->with('flashBanner', 'Please check your fields for the errors below')
                    ->withInput()
                    ->withErrors($validator);
                }
        
            /*Get post data from submitted page to verify password*/
            $postVerify = Input::get('verifyPass');

            if (Hash::check( $postVerify, $user->password ))
                {
                    $user->save();
                    Auth::login($user);
                    return Redirect::to('/')->with('flashBanner', 'Account Created Succesfully. You are now logged in.');
                }
        
            else
                {
                    return Redirect::to('/register')
                        ->with('flashBanner', 'Paswords do not match, please fix')
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
                return Redirect::intended('/')->with('flashBanner', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flashBanner', 'Invalid Email or Password, Please Try Again');
            }
        }

    /*Section to log user out*/
	public function getLogout()
        {
            Auth::logout();
            return Redirect::to('/')->with('flashBanner', 'You are logged out.');
        }

}
