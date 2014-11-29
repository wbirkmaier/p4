@extends('_master')

@section('active')

	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
    <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>

@stop

@section('content')

    <h3>You are about to delete a feed named {{ $feed->name }}!</h3>
    <br>    
    <h3>Do you want to continue?</h3>
    <br>
    <form method="post" role="form" action="{{ action('IndexController@postDeleteFeed') }}">
        <input type="hidden" name="feed" value="{{ $feed->id }}"/>
        <input class="btn btn-danger" type="submit" value="Yes"/>
        <a href="{{ action('IndexController@showIndex') }}" class="btn btn-default">Return to Dashboard</a>
    </form>

@stop