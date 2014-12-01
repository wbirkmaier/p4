@extends('_master')

@section('active')
    /* Generate dynamic menu base on URL and Login Status */
	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}">Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>
    @endif

@stop

@section('content')

//Test Code//<br>

<a href="{{ action('IndexController@createFeed') }}" class="btn btn-primary">Create Feed</a>

@if ($feeds->isEmpty())
    <p>No Feed Records Found</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>Max Results</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      
@foreach($feeds as $feed)
        <tr>
            <td>{{ $feed->name }}</td>
            <td>{{ $feed->url }}</td>
            <td>{{ $feed->maxresults }}</td>
            <td>
                <a href="{{ action('IndexController@changeFeed', $feed->id) }}"class="btn btn-primary">Modify</a>
                <a href="{{ action('IndexController@deleteFeed', $feed->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
@endforeach

        </tbody>
    </table>

@endif

//End Test Code//

        	<div data-dojo-type="dojox.layout.GridContainer" data-dojo-props='id:"gc1", handleClasses:"dijitTitlePaneTitle", withHandles:"true", nbZones:"3", hasResizableColumns:"false", opacity:"0.3", allowAutoScroll:"true", region:"center", minChildWidth:"20", minColWidth:"20", isAutoOrganized:"true"'> 

        <div data-dojo-type="dojox.widget.Portlet" data-dojo-props='title:"Portlets Refreshed Every 30 Minutes", column:"1"'>
                	<div data-dojo-type="dojox.widget.PortletSettings"></div>
		      <div>
			     Page Last Refreshed on: <script> document.write('<b>' + (new Date).toLocaleString() + '</b>'); </script>
		         <br>
		         <br>
		         Click the settings icon in the title bar to enter a different feed to load. Hovering over a news item shows a summary of it in a tooltip.
		         <br>
		         <br>
                    @if (Auth::check())
                        <a href="{{ action('IndexController@getLogout') }}" class="btn btn-primary">Logout</a>
                    @else
                         Would you like to customize this view?<br>
                        <br>
                        <b>
                        <a href="{{ action('IndexController@getLogin') }}" class="btn btn-primary">Login</a></b> or <b><a href="{{ action('IndexController@getRegister') }}" class="btn btn-primary">Register</a>
                    @endif
                </b>
              </div>
        </div>

	    <div data-dojo-type="dojox.widget.Portlet" data-dojo-props='title:"Calendar Portlet", column:"1"'>
                <div data-dojo-type="dojox.widget.PortletSettings">
                    Put whatever settings you like in here
                </div>
                <div>
			 <!-- -->
                </div>
                <div data-dojo-type="dojox.widget.Calendar">
                    <script type="dojo/connect" data-dojo-event="onValueSelected" data-dojo-args="date">
                        dojo.byId("dateGoesHere").innerHTML = "Date Selected: " + date.toString();
                    </script>
                </div>
                <div id="dateGoesHere">
                </div>
            </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"slashDotNews",
                url:"http://rss.slashdot.org/Slashdot/slashdot", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"slashDotLinux",
                url:"http://rss.slashdot.org/Slashdot/slashdotlinux", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"bbcFeed",
                url:"http://feeds.bbci.co.uk/news/rss.xml", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"slashDotHardware",
                url:"http://rss.slashdot.org/Slashdot/slashdothardware", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"slashDotIt",
                url:"http://rss.slashdot.org/Slashdot/slashdotit",  maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"cnnTopNews",
        	url:"http://rss.cnn.com/rss/cnn_topstories.rss", maxResults:"10"'>
            	<div data-dojo-type="dojox.widget.PortletFeedSettings">
            	</div>
            	<div>
			<!---->
            	</div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"itWorldFeed",
                url:"http://www.itworld.com/taxonomy/term/16/all/feed", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"nextWebFeed",
                url:"http://thenextweb.com/feed/rss", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>

                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"xconomyItFeed",
                url:"http://feeds.feedburner.com/Xconomy_IT", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"xconomyVcFeed",
                url:"http://feeds.feedburner.com/Xconomy_VC", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"linuxJournalFeed",
                url:"http://feeds.feedburner.com/linuxjournalcom", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"techRepublicFeed",
                url:"http://www.techrepublic.com/rssfeeds/articles/latest/", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"cioFeed",
                url:"http://feeds.cio.com/cio/feed/articles", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"networkWorldFeed",
                url:"http://www.networkworld.com/rss", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"bizJournalFeed",
                url:"http://feeds.bizjournals.com/bizj_boston", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"ycFeed", column:"1",
                url:"https://news.ycombinator.com/rss", maxResults:"10"'>
                <div data-dojo-type="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

        </div>

@stop
