<?php

class IndexController extends BaseController {

    /*Inherit __construct method from BaseController*/
	public function __construct()
        {
            parent::__construct();
        }
        
    /*Landing page for P4 will select all feeds with user id of 1 and display*/
	public function showIndex()
        {   
            if (Auth::check())
                {
                    $user = Auth::id();
                    $feeds = User::find($user)->feeds;
                }
            else
                {
                    /* $feeds = Feed::all();*/
                    $user = '1';
                    $feeds = User::find($user)->feeds;
                }
        
            return View::make('indexFeed', compact('feeds'));
        }
    
    /*Section to alower a user to enter customized feeds for main page*/
    public function customizeFeed()
        {
            if (Auth::check())
                {
                    $user = Auth::id();
                    $feeds = User::find($user)->feeds;
                    return View::make('customizeFeed', compact('feeds'));
                }
            else
                {
                    return Redirect::to('/login')->with('flashBanner', 'Please Login.');
                }
        }
    
    /*Section to allow a user to create a new feed in database*/
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
    
    /*After feed date is entered, will check that feed name has no strange characers, is unique and will also check that URL is syntactically valid */
    public function postCreateFeed()
        {
            if (Auth::check())
                {
                    /*used for attaching user to object*/
                    $user = Auth::id();
                    /*Create new feed object*/
                    $feed = new Feed;
                
                    /*Class to strip any strange characters from feed name*/
                    /*Create new object */
                    $sanitize = new Sanitize;
                    
                    /*Call the method and set the string */
                    $sanitize->setSanitize(Input::get('name'));
                                        
                    /*call the method and return the string cleaned*/
                    $cleanedName = $sanitize->getSanitize();
                
                    /*Save cleaned and checked duplicate name to database from Unique model Needs more work*/
                    /*$feed->name = Unique::nameCheck($cleanedName);*/
                
                    /*Code to check that each feed name is unique for for the dojo widget*/
                    $feeds = User::find($user)->feeds;
                    foreach ($feeds as $feedName)
                        {
                            /*Search each feed for it's name and compare to the form enterned name*/
                            if  ($feedName->name == $cleanedName)
                                {
                                    return Redirect::to('/createFeed')
                                    ->with('flashBanner', 'Please ensure your RSS Feed Name is unique.')
                                    ->withInput();
                                } 
                        }
                    
                    /*Save cleaned and checked duplicate name to database*/
                    $feed->name = $cleanedName;
                    
                
                    /*Check if URL is syntactically valid*/
                    $testURL = Input::get('url');
                    if(!filter_var($testURL, FILTER_VALIDATE_URL))
                        {
                            return Redirect::to('/createFeed')
                            ->with('flashBanner', 'Please ensure your URL it technically correct.')
                            ->withInput();
                        }
                    else
                        {
                            /*Save checked URL here*/
                            $feed->url = $testURL;
                        }
                    
                    $feed->maxresults = Input::get('maxresults');
                    
                    /*Save Record to database*/
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
    
    /*Section to post process the input when you change feed in database making sure that if the name of the feed has changed, it is still unique and the url is syntactically correct*/
    public function postChangeFeed()
        {
            if (Auth::check())
                {   
                    /*Fail if ID for row is not found*/
                    $feed = Feed::findOrFail(Input::get('id'));
                
                    /*Class to strip any strange characters from feed name*/
                    /*Create new object */
                    $sanitize = new Sanitize;
                    
                    /*Call the method and set the string */
                    $sanitize->setSanitize(Input::get('name'));
                                        
                    /*call the method and return the string cleaned*/
                    $cleanedName = $sanitize->getSanitize();
                
                    /*Check if the feed name has changed when edditing and if it has, then verify it is OK to proceed and is unique*/
                    if ($cleanedName != $feed->name)
                        {
                 
                            /*Code to check that each feed name is unique for for the dojo widget*/
                            $user = Auth::id();
                            $feeds = User::find($user)->feeds;
                            foreach ($feeds as $feedName)
                                {
                                    /*Search each feed for it's name and compare to the form enterned name*/
                                    if  ($feedName->name == $cleanedName)
                                        {
                                            return Redirect::to('/customizeFeed')
                                            ->with('flashBanner', 'Please ensure your RSS Feed Name is unique.')
                                            ->withInput();
                                        } 
                                }
                        }
                
                    /*Save cleaned and checked duplicate name to database*/
                    $feed->name = $cleanedName;
                
                
                    /*Check if URL is valid*/
                    $testURL = Input::get('url');
                    if(!filter_var($testURL, FILTER_VALIDATE_URL))
                        {
                            return Redirect::to('/createFeed')
                            ->with('flashBanner', 'Please ensure your URL it technically correct.')
                            ->withInput();
                        }
                    else
                        {
                            /*Save checked URL here*/
                            $feed->url = $testURL;
                        }
                
                    $feed->maxresults = Input::get('maxresults');
                
                    /*Save Record to database*/
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
    
    /*Delete the feed and then return to the customized feed view*/
    public function postDeleteFeed()
        {
            if (Auth::check())
                {
                    $user = Auth::id();
                    $id = Input::get('feed');
                    $feed = Feed::findOrFail($id);
                
                    /*Delete pivot table association */
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

    /*Take user registration variables and make sure the username and email are unique, also verify that the passwor is at least 3 characters long*/
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
        
            /*Check that all rules as defined above are met*/
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

    /*Pass login credentials to start session*/
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
