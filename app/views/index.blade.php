@extends('_master')

@section('active')

	<li class="active"><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Login</a></li>

@stop

@section('content')

        	<div dojoType="dojox.layout.GridContainer" id="gc1" acceptTypes="dojox.widget.Portlet, dojox.widget.FeedPortlet,dojox.widget.ExpandableFeedPortlet" hasResizableColumns="false" opacity="0.3" nbZones="1" allowAutoScroll="true" withHandles="true" handleClasses="dijitTitlePaneTitle" region="center" minChildWidth="50" minColWidth="20" isAutoOrganized="false">

            	<div dojoType="dojox.widget.Portlet" title="Portlets Refreshed Every 30 Minutes" column="1">
                	<div dojoType="dojox.widget.PortletSettings"></div>
		<div>
			Page Last Refreshed on: <script language="JavaScript"> document.write('<b>' + (new Date).toLocaleString() + '</b>'); </script>
		    <br>
		    <br>
		    Click the settings icon in the title bar to enter a different feed to load. Hovering over a news item shows a summary of it in a tooltip.
		    <br>
		    <br>
		    Would you like to customize this view?  Click here to <b>log in</b> or here to <b>create</b> and account!
                </div>
            </div>

	    <div dojoType="dojox.widget.Portlet" title="Calendar Portlet" column="1">
                <div dojoType="dojox.widget.PortletSettings">
                    Put whatever settings you like in here
                </div>
                <div>
			 <!-- -->
                </div>
                <div dojoType="dojox.widget.Calendar">
                    <script type="dojo/connect" event="onValueSelected" args="date">
                        dojo.byId("dateGoesHere").innerHTML = "Date Selected: " + date.toString();
                    </script>
                </div>
                <div id="dateGoesHere">
                </div>
            </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashDotNews"
                url="http://rss.slashdot.org/Slashdot/slashdot" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashDotLinux"
                url="http://rss.slashdot.org/Slashdot/slashdotlinux" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="bbcFeed"
                url="http://feeds.bbci.co.uk/news/rss.xml" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashDotHardware"
                url="http://rss.slashdot.org/Slashdot/slashdothardware" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashDotIt"
                url="http://rss.slashdot.org/Slashdot/slashdotit" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="cnnTopNews"
        	url="http://rss.cnn.com/rss/cnn_topstories.rss" maxResults="10">
            	<div dojoType="dojox.widget.PortletFeedSettings">
            	</div>
            	<div>
			<!---->
            	</div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="itWorldFeed"
                url="http://www.itworld.com/taxonomy/term/16/all/feed" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="nextWebFeed"
                url="http://thenextweb.com/feed/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>

                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="xconomyItFeed"
                url="http://feeds.feedburner.com/Xconomy_IT" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="xconomyVcFeed"
                url="http://feeds.feedburner.com/Xconomy_VC" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="linuxJournalFeed"
                url="http://feeds.feedburner.com/linuxjournalcom" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>




	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="techRepublicFeed"
                url="http://www.techrepublic.com/search?t=1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22&o=1&mode=rss&tag=mantle_skin;content" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="cioFeed"
                url="http://feeds.cio.com/cio/feed/articles" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="networkWorldFeed"
                url="http://www.networkworld.com/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="bizJournalFeed"
                url="http://feeds.bizjournals.com/bizj_boston" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="ycFeed"
                url="https://news.ycombinator.com/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

        </div>

@stop
