@extends('_master')

@section('active')

    <!-- Generate dynamic menu base on URL and Login Status -->
	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@customizeFeed') }}">Customize</a></li>
        <li><a href="{{ action('IndexController@getLogout') }}">Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>
    @endif

@stop

@section('content')

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
                <div id="dateGoesHere"></div>
            </div>
            
@foreach($feeds as $feed)
            <div data-dojo-type="dojox.widget.FeedPortlet" data-dojo-props='id:"{{ $feed->name }}",
                url:"{{ $feed->url }}", maxResults:"{{ $feed->maxresults }}"'>
                    <div data-dojo-type="dojox.widget.PortletFeedSettings"></div>
            </div>
@endforeach
            
	   

        </div>

@stop
