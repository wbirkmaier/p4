@extends('_master')

@section('active')
    <!-- Primary page for debug purpose -->
    <!-- Generate dynamic menu base on URL and Login Status -->
	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif

@stop

@section('content')

<h1>debug!</h1>
 <!-- place debug code here -->
@stop
