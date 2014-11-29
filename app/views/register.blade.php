@extends('_master')

@section('active')

	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
    <li class="active"><a href="{{ action('IndexController@getRegister') }}">Register</a></li>

@stop

@section('content')

    <form action="{{ url('register') }}" method="post">
        <p><label for="username">Username:</label></p>
        <p><input type="text" name="username" placeholder="Username" /></p>
        <p><label for="email">Email:</label></p>
        <p><input type="text" name="email" placeholder="Email" /></p>
        <p><label for="password">Password:</label></p>
        <p><input type="password" name="password" placeholder="Password" /></p>
        <p><input type="submit" value="Register" class="btn btn-primary"/></p>
         <?= Form::token() ?>
        <br>
    </form>

@stop
