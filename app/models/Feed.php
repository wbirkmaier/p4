<?php

class Feed extends Eloquent
    {   
        /*Each feed object belongs to many User objects in the database*/
        public function users()
            {
                return $this->belongsToMany('User');
            }
    
        /*Get all Feeds from the database */
        public static function getIndexFeed()
            {
		      $feeds = Array();
		      $indexFeed = Feed::all();
            
		      foreach($indexFeed as $feed)
                {
			         $feeds[$feed->id] = $feed->name;
		        }
            
		      return $feeds;
	         }
    
    }