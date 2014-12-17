@extends('_master')

@section('active')
    <!-- Primary views for changing a feed -->
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

    <h1>You are now editing {{ $feed->name }}.</h1>

    <form method="post" role="form" action="{{ action('IndexController@postChangeFeed') }}">
        <input type="hidden" name="id" value="{{ $feed->id }}"/>
        <label for="Name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $feed->name }}"/>
        <br>
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" value="{{ $feed->url }}"/>
        <br>
        <label for="maxresults">Number of Articles to Return - Less than 100, default 10</label>
        <input class="form-control" type="int" name="maxresults" value="{{ $feed->maxresults }}"/>
        <br>
        <input class="btn btn-primary" type="submit" value="Save"/>
        <a href="{{ action('IndexController@customizeFeed') }}" class="btn btn-danger"> <i class="fa fa-trash-o fa-lg"></i> Cancel</a>
         <?= Form::token() ?>
        <br>
    </form>

@stop
