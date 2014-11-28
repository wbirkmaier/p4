@extends('_master')

@section('active')

	<li><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li class="active"><a href="/login">Login</a></li>

@stop

@section('content')

        <form action="{{ url('login') }}" method="post">
                <p><label for="email">Email:</label></p>
                <p><input type="text" name="email" placeholder="Email" /></p>
                <p><label for="password">Password:</label></p>
                <p><input type="password" name="password" placeholder="Password" /></p>
                <p><input type="submit" value="Login" /></p>
        </form>

@stop
