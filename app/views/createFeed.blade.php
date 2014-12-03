@extends('_master')

@section('active')

	<!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li class="active"><a href="{{ action('IndexController@customizeFeed') }}">Customize</a></li>
        <li><a href="{{ action('IndexController@getLogout') }}">Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>
    @endif

@stop

@section('content')

    <h1>Enter an RSS Feed URI to store in your account</h1>

    <form method="post" role="form" action="{{ action('IndexController@postCreateFeed') }}">
        <label for="title">Feed Name</label>
        <input class="form-control" type="text" name="name" placeholder="CNN News"/>
        <br>
        <label for="url">RSS Feed URL</label>
        <input class="form-control" type="text" name="url" placeholder="cnn.com/rss.xml"/>
        <br>
        <label for="maxresults">Number of Articles to Return</label>
        <input class="form-control" type="int" name="maxresults" placeholder="10"/>
        <br>
        <input type="submit" value="Create" class="btn btn-primary"/>
        <a href="{{ action('IndexController@showIndex') }}" class="btn btn-danger">Cancel</a>
        <?= Form::token() ?>
        <br>
    </form>

@stop
