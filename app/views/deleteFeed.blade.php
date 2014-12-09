@extends('_master')

@section('active')
    <!-- Primary view for deleting feeds -->
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

    <h3>You are about to delete a feed named {{ $feed->name }}!</h3>
    <br>    
    <h3>Do you want to continue?</h3>
    <br>
    <form method="post" role="form" action="{{ action('IndexController@postDeleteFeed') }}">
        <input type="hidden" name="feed" value="{{ $feed->id }}"/>
        <input class="btn btn-danger" type="submit" value="Yes"/>
        <a href="{{ action('IndexController@customizeFeed') }}" class="btn btn-default">Return to Customize View</a>
         <?= Form::token() ?>
        <br>
    </form>

@stop
