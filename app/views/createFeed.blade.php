@extends('_master')

@section('active')
    <!-- Primary view for creating feeds -->
	<!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li class="active"><a href="{{ action('IndexController@customizeFeed') }}"> <i class="fa fa-cogs"></i> Customize</a></li>
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif

@stop

@section('content')

    <h3>Enter an RSS Feed URI to store in your account</h3>

    <form method="post" role="form" action="{{ action('IndexController@postCreateFeed') }}">
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
            
            <!--<input placeholder="your unique feed name - CNN News" class="form-control" name="name" type="text" value=""/>-->
            {{ Form::text('name', '', array('placeholder'=>'your unique feed name - CNN News', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-rss-square"></i></span>
            
            <!--<input placeholder="your feed url - http://rss.cnn.com/rss/cnn_tech.rss" class="form-control" name="url" type="text" value=""/>-->
            {{ Form::text('url', '', array('placeholder'=>'your feed url - http://rss.cnn.com/rss/cnn_tech.rss', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-download"></i></span>
            
            <!--<input placeholder="number of articles to return - 10" class="form-control" name="maxresults" type="int" value=""/>-->
            {{ Form::number('maxresults', '', array('placeholder'=>'number of articles to return - 10', 'class'=>'form-control')) }}
        </div>
        <br>
        <input type="submit" value="Create" class="btn btn-primary"/>
        <a href="{{ action('IndexController@showIndex') }}" class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i> Cancel</a>
        <?= Form::token() ?>
        <br>
    </form>

@stop
