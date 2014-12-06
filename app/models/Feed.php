<?php

class Feed extends Eloquent
    {   
        public function users()
            {
                return $this->belongsToMany('User');
            }
    
    
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