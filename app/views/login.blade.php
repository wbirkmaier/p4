@extends('_master')

@section('active')
    
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    <li class="active"><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
    <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>

@stop

@section('content')

    <form method="post" action="{{ url('login') }}" >
        <p><label for="email">Email:</label></p>
        <p><input class="form-control" type="text" name="email" placeholder="Email"/></p>
        <p><label for="password">Password:</label></p>
        <p><input class="form-control" type="password" name="password" placeholder="Password" /></p>
        <p><input type="submit" value="Login" class="btn btn-primary"/></p>
         <?= Form::token() ?>
        <br>
    </form>

@stop
