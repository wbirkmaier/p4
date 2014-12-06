<?php
//Called in app/database/seeds/DatabaseSeeder.php
class P4Seeder extends Seeder
    {
    
    public function run() 
        {
        
            DB::statement('SET FOREIGN_KEY_CHECKS=0'); 
            
            //Truncate all tables
            DB::statement('TRUNCATE feeds');
            DB::statement('TRUNCATE users');
        
            //Add a test user
            $user = new User;
            $user->username = 'tgmail';
            $user->given = 'Test';
            $user->sur = 'Gmail';
            $user->password = Hash::make('123');
            $user->email = 'test@gmail.com';
            $user->save();
        
            //Add URLs for RSS Feeds to be displayed on default home page
            $feed = new Feed;
            $feed->name = 'slashDotNews';
            $feed->url = 'http://rss.slashdot.org/Slashdot/slashdot';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'slashDotLinux';
            $feed->url = 'http://rss.slashdot.org/Slashdot/slashdotlinux';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'bbcFeed';
            $feed->url = 'http://feeds.bbci.co.uk/news/rss.xml';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'slashDotHardware';
            $feed->url = 'http://rss.slashdot.org/Slashdot/slashdothardware';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'slashDotIt';
            $feed->url = 'http://rss.slashdot.org/Slashdot/slashdotit';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'cnnTopNews';
            $feed->url = 'http://rss.cnn.com/rss/cnn_topstories.rss';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'itWorldFeed';
            $feed->url = 'http://www.itworld.com/taxonomy/term/16/all/feed';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'nextWebFeed';
            $feed->url = 'http://thenextweb.com/feed/rss';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'xconomyItFeed';
            $feed->url = 'http://feeds.feedburner.com/Xconomy_IT';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'xconomyVcFeed';
            $feed->url = 'http://feeds.feedburner.com/Xconomy_VC';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'linuxJournalFeed';
            $feed->url = 'http://feeds.feedburner.com/linuxjournalcom';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'techRepublicFeed';
            $feed->url = 'http://www.techrepublic.com/rssfeeds/articles/latest/';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'cioFeed';
            $feed->url = 'http://feeds.cio.com/cio/feed/articles';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'networkWorldFeed';
            $feed->url = 'http://www.networkworld.com/rss';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'bizJournalFeed';
            $feed->url = 'http://feeds.bizjournals.com/bizj_boston';
            $feed->maxresults = '10';
            $feed->save();
        
            $feed = new Feed;
            $feed->name = 'ycFeed';
            $feed->url = 'https://news.ycombinator.com/rss';
            $feed->maxresults = '10';
            $feed->save();

        }   
    }