<?php

class Unique extends Eloquent
    {
        public static function nameCheck(&$cleanedName)
        {
            /*Code to check that each feed name is unique for for the dojo widget*/
            $user = Auth::id();
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
                    else
                        {   
                            $feed->name = $cleanedName;
                        }
                }
                
            /*Return cleaned and checked duplicate*/
            return $cleanedName;
        }
    }
