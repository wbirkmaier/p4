@extends('_master')

@section('active')

	<li class="active"><a href="/">Home</a></li>
        <li><a href="/user/register">Register</a></li>
        <li><a href="/user/login">Login</a></li>

@stop

@section('content')

        	<div data-dojo-type="dojox.layout.GridContainer" id="gc1" acceptTypes="dojox.widget.Portlet, dojox.widget.FeedPortlet,dojox.widget.ExpandableFeedPortlet" hasResizableColumns="false" opacity="0.3" nbZones="3" allowAutoScroll="true" withHandles="true" handleClasses="dijitTitlePaneTitle" region="center" minChildWidth="50" minColWidth="20" isAutoOrganized="true">

            	<div data-dojo-type="dojox.widget.Portlet" title="Portlets Refreshed Every 30 Minutes" column="1">
                	<div data-dojo-type="dojox.widget.PortletSettings"></div>
		<div>
			Page Last Refreshed on: <script language="JavaScript"> document.write('<b>' + (new Date).toLocaleString() + '</b>'); </script>
		    <br>
		    <br>
		    Click the settings icon in the title bar to enter a different feed to load. Hovering over a news item shows a summary of it in a tooltip.
		    <br>
		    <br>
		    Would you like to customize this view?  <b><a href="/user/login">Login</a></b> or <b><a href="/user/register">Register</a></b> an account!
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
                    <script type="dojo/connect" event="onValueSelected" args="date">
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
                url:"http://www.techrepublic.com/search?t=1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22&o=1&mode=rss&tag=mantle_skin;content", maxResults:"10"'>
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
