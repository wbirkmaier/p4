# Project P4
Wil Birkmaier

### Live URL for project:
<http://p4.awkupi.me>

### Description:
This project is the culmination of all the subject matter I have learned thus far in Dynamic Web Applications. The project will:
+ Use PHP/Laravel.
+ Use a database with at least 2 tables (users, feeds and feed_user) . This count does not include a users table, but does include pivot tables.
+ Demonstrates all 4 CRUD interactions (user signup/login does not count towards this).

### What the application does:
This application is a simple RSS news feed aggregator:
+ Default page shows pre-selected RSS feeds.
+ Creating an account allows you to add your own RSS feeds ex. <http://feeds.feedburner.com/pbs/wgbh/frontline/programs-feed>.
+ You are only allowed to create and edit your own feeds.
+ Dynamic page displayed based on log in status.

### Demo Information:
I plan to do an in person demo in my Section after Thursday's lecture in front of my group and TA Dan.

### Additional Information:
+ Coded to HTML5 standards and uses the <http://validator.w3.org/> service to check it.
+ No Login is required, however you can create your own account, and then login and customize.
+ JavaScript must be enabled on the browser.
+ Uses local database P4, and seeds.
 + php artisan migrate:make create_feeds; php artisan migrate
 + php artisan session:table; php artisan migrate
 + php artisan migrate:make create_users; php artisan migrate
 + php artisan migrate:make create_Feed_User_Table
 + php artisan db:seed

### Plugins and Outside Code used Credits:
+ Used the Dojo Toolkit Framework from <http://dojotoolkit.org/download/> and code hosted on https://ajax.googleapis.com
+ Used sample code from <http://dojotoolkit.org/reference-guide/1.10/dojox/layout/GridContainer.html#dojox-layout-gridcontainer>
+ Used sample code from <http://dojotoolkit.org/reference-guide/1.10/dojox/widget/Portlet.html#basic-feed-portlet>
+ Used Bootstrap v3.2.0 from <http://getbootstrap.com/> via <https://github.com/twbs/bootstrap/releases/download/v3.2.0/bootstrap-3.2.0-dist.zip>.
+ Used Bootstrap Template <http://getbootstrap.com/examples/starter-template/> and CSS for that template.
+ Used jQuery 1.11.1 from <https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js>.
+ Used and derived code from auto page refresh <http://grizzlyweb.com/webmaster/javascripts/refresh.asp>
+ Used barryvdh / laravel-debugbar for development environment <https://github.com/barryvdh/laravel-debugbar>
+ Lots of help from Code Bright by Dayle Rees, especially the chapter "Build an App".
+ Super smart person Susan Buck and my TAs Dan and Nick.