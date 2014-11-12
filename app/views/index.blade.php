<!DOCTYPE html>

	<!--	Dynamic Web Applications Fall 2014  					-->
	<!--    Project Number 4		    					-->
	<!--    Wil Birkmaier			    					-->
	<!--    Final Project using what has been learned in class so far		-->

<html>

<head>
	<title>Project 4 - RSS News Dashboard</title>

	<meta charset="utf-8">
	
	<!--	Load Code for Dojo Toolkit	-->

	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dijit/themes/claro/claro.css"/>

        <style type="text/css">
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/widget/Portlet/Portlet.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/layout/resources/GridContainer.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/widget/Calendar/Calendar.css";
            .dndDropIndicator { border: 2px dashed #99BBE8; cursor:default; margin-bottom:5px;
        </style>

        <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojo/dojo.js" djConfig="parseOnLoad: true"></script>
        <script type="text/javascript">
            dojo.require("dijit.dijit");
            dojo.require("dojox.widget.Portlet");
            dojo.require("dojox.widget.FeedPortlet");
            dojo.require("dojox.layout.GridContainer");
            dojo.require("dojox.widget.Calendar");
        </script>

	<!--	Code to refresh the main page for latest feeds.					-->
	<!--	The browser goes through each block and uses the most recent one it can		-->
	<!--	Code derived from http://grizzlyweb.com/webmaster/javascripts/refresh.asp	-->

	<script language="JavaScript">
		var sURL = unescape(window.location.pathname);
		function doLoad()
		{
		    // the timeout value should be the same as in the "refresh" meta-tag
		    setTimeout( "refresh()", 1800*1000 );
		}

		function refresh()
		{
		    window.location.href = sURL;
		}
	</script>

	<script language="JavaScript1.1">
		function refresh()
		{		
		    window.location.replace( sURL );
		}
	</script>

	<script language="JavaScript1.2">
		function refresh()
		{
		    window.location.reload( false );
		}
	</script>

</head>


<!-- Use the "onload" event to start the refresh process. -->
<body onload="doLoad()">

	<body class=" claro ">
        	<div dojoType="dojox.layout.GridContainer" id="gc1" acceptTypes="dojox.widget.Portlet, dojox.widget.FeedPortlet,dojox.widget.ExpandableFeedPortlet" hasResizableColumns="false" opacity="0.3" nbZones="4" allowAutoScroll="true" withHandles="true" handleClasses="dijitTitlePaneTitle" region="center" minChildWidth="200" minColWidth="40">

            	<div dojoType="dojox.widget.Portlet" title="Portlets Refreshed Every 30 Minutes">
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

	    <div dojoType="dojox.widget.Portlet" title="Calendar Portlet">
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

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashdotnews"
                url="http://rss.slashdot.org/Slashdot/slashdot" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashdotlinux"
                url="http://rss.slashdot.org/Slashdot/slashdotlinux" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="bbcfeed"
                url="http://feeds.bbci.co.uk/news/rss.xml" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashdothardware"
                url="http://rss.slashdot.org/Slashdot/slashdothardware" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="slashdotit"
                url="http://rss.slashdot.org/Slashdot/slashdotit" maxResults="10">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="cnntopnews"
        	url="http://rss.cnn.com/rss/cnn_topstories.rss" maxResults="10">
            	<div dojoType="dojox.widget.PortletFeedSettings">
            	</div>
            	<div>
			<!---->
            	</div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="ITWorldfeed"
                url="http://www.itworld.com/taxonomy/term/16/all/feed" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="nextwebfeed"
                url="http://thenextweb.com/feed/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>

                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="xconomyitfeed"
                url="http://feeds.feedburner.com/Xconomy_IT" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="xconomyvcfeed"
                url="http://feeds.feedburner.com/Xconomy_VC" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

           <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="linuxJournalfeed"
                url="http://feeds.feedburner.com/linuxjournalcom" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>




	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="techrepublicfeed"
                url="http://www.techrepublic.com/search?t=1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22&o=1&mode=rss&tag=mantle_skin;content" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="ciofeed"
                url="http://feeds.cio.com/cio/feed/articles" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="networkworldfeed"
                url="http://www.networkworld.com/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="BizJournalFeed"
                url="http://feeds.bizjournals.com/bizj_boston" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
                        <!---->
                </div>
           </div>

	   <div dojoType="dojox.widget.FeedPortlet" title="Todays News" id="YCfeed"
                url="https://news.ycombinator.com/rss" maxResults="200">
                <div dojoType="dojox.widget.PortletFeedSettings">
                </div>
                <div>
			<!---->
                </div>
           </div>

        </div>

    </body>

</html>

