@extends('_master')

@section('active')
    <!-- Primary view for feeds -->
    <!-- Generate dynamic menu base on URL and Login Status -->
	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@customizeFeed') }}"> <i class="fa fa-cogs"></i> Customize</a></li>
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif

@stop

@section('content')

    <!--What to show for a new user when no feeds are found in the database-->
@if ($feeds->isEmpty())
    <h3>No Feed Records Found</h3>
    <br>
    <a href="{{ action('IndexController@createFeed') }}" class="btn btn-primary">Create Feed</a>
    <br>
    <br>

@else
        <!-- Dojo specific code block-->
        <div data-dojo-type="dojox.layout.GridContainer" data-dojo-props='id:"gc1", handleClasses:"dijitTitlePaneTitle", withHandles:"true", nbZones:"3", hasResizableColumns:"false", opacity:"0.3", allowAutoScroll:"true", region:"center", minChildWidth:"20", minColWidth:"20", isAutoOrganized:"true"'> 

        <!--Primary dojo portlet with information-->
        <div data-dojo-type="dojox.widget.Portlet" data-dojo-props='title:"Portlets Refreshed Every 30 Minutes", column:"1"'>
                	<div data-dojo-type="dojox.widget.PortletSettings"></div>
		      <div>
			     Page Last Refreshed on: <script> document.write('<b>' + (new Date).toLocaleString() + '</b>'); </script>
		         <br>
		         <br>
		         Click the settings icon in the title bar to enter a different feed to load. Hovering over a news item shows a summary of it in a tooltip.
		         <br>
		         <br>
                    <!--Check if a user is logged in and decide view to present -->
                    @if (Auth::check())
                        <a href="{{ action('IndexController@getLogout') }}" class="btn btn-primary"> <i class="fa fa-sign-out"></i> Logout</a>
                    @else
                         Would you like to customize this view?<br>
                        <br>
                        <b>
                        <a href="{{ action('IndexController@getLogin') }}" class="btn btn-primary"> <i class="fa fa-sign-in"></i> Login</a></b> or <b><a href="{{ action('IndexController@getRegister') }}" class="btn btn-primary"> <i class="fa fa-keyboard-o"></i> Register</a>
                    @endif
                </b>
              </div>
        </div>
            
        <!--Calendard dojo widget -->
	    <div data-dojo-type="dojox.widget.Portlet" data-dojo-props='title:"Calendar Portlet", column:"1"'>
                <div data-dojo-type="dojox.widget.PortletSettings">
                    Put whatever settings you like in here
                </div>
 
                <div data-dojo-type="dojox.widget.Calendar">
                    <script type="dojo/connect" data-dojo-event="onValueSelected" data-dojo-args="date">
                        dojo.byId("dateGoesHere").innerHTML = "Date Selected: " + date.toString();
                    </script>
                </div>
                <div id="dateGoesHere"></div>
                <br>
            </div>
            
<!--All the custom feeds for a view-->            
@foreach($feeds as $feed)
            <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"{{ $feed->name }}",
                url:"{{ $feed->url }}", maxResults:"{{ $feed->maxresults }}"'>
                    <div data-dojo-type="dojox.widget.PortletFeedSettings"></div>
            </div>
@endforeach
	   

        </div>
@endif

@stop
