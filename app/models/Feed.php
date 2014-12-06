<?php

class Feed extends Eloquent
    {   
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