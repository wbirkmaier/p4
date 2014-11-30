<!DOCTYPE html>

        <!--    Dynamic Web Applications Fall 2014                                      -->
        <!--    Project Number 4                                                        -->
        <!--    Wil Birkmaier                                                           -->
        <!--    Final Project using what has been learned in class so far               -->

<html>

<head>
	<title>Project 4 - RSS News Dashboard</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css"/>
	<!-- Custom styles for this template -->
	<link href="/css/starter-template.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- Load Code for Dojo Toolkit -->
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dijit/themes/nihilo/nihilo.css"/>

        <style type="text/css">
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/widget/Portlet/Portlet.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/layout/resources/GridContainer.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojox/widget/Calendar/Calendar.css";
            .dndDropIndicator { border: 2px dashed #99BBE8; cursor:default; margin-bottom:5px;
        </style>

        <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.2/dojo/dojo.js" data-dojo-config="parseOnLoad: true"></script>
        <script type="text/javascript">
            dojo.require("dijit.dijit");
            dojo.require("dojox.widget.Portlet");
            dojo.require("dojox.widget.FeedPortlet");
            dojo.require("dojox.layout.GridContainer");
            dojo.require("dojox.widget.Calendar");
        </script>

        <!--    Code to refresh the main page for latest feeds.                                 -->
        <!--    The browser goes through each block and uses the most recent one it can         -->
        <!--    Code derived from http://grizzlyweb.com/webmaster/javascripts/refresh.asp       -->

        <script type="text/javascript">
                var sURL = unescape(window.location.pathname);
                function doLoad()
                {
                    // setTimeout value is set to 30 minute refresh intervals
                    setTimeout( "refresh()", 1800*1000 );
                }

		function refresh()
                {
                    window.location.reload( false );
                }
        </script>

</head>

<body class="nihilo" onload="doLoad()">
    
    <!-- Added for Flash Messages -->
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
    
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
	        	<div class="navbar-header">
        			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">RSS News Dashboard</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
	
					@yield('active')

				</ul>
			</div>
		</div>
	</div>

    	<div class="container">

		<div class="starter-template">
			<p class="lead">

			@yield('content')
			
		</div>
	</div>	


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>	

</body>

</html>
