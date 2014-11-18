@extends('_master')

@section('active')

	<li><a href="/">Home</a></li>
        <li><a href="/user/register">Register</a></li>
        <li class="active"><a href="/user/login">Login</a></li>

@stop

@section('content')

        <form action="{{ url('user/login') }}" method="post">
                <p><label for="email">Email:</label></p>
                <p><input type="text" name="email" placeholder="Email" /></p>
                <p><label for="password">Password:</label></p>
                <p><input type="password" name="password" placeholder="Password" /></p>
                <p><input type="submit" value="Create" /></p>
        </form>

@stop
