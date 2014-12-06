@extends('_master')

@section('active')

    <!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}">Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
        <li class="active"><a href="{{ action('IndexController@getRegister') }}">Register</a></li>
    @endif
	

@stop

@section('content')

@foreach ($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
    <br>
@endforeach

    <form action="{{ url('register') }}" method="post">
        <p><label for="username">Username:</label></p>
        <p><input type="text" name="username" placeholder="ddoe"/></p>
        
        <p><label for="given">Name:</label></p>
        <p><input type="text" name="given" placeholder="Deer"/></p>
        
        <p><label for="sur">Last Name:</label></p>
        <p><input type="text" name="sur" placeholder="Doe"/></p>
        
        <p><label for="email">Email:</label></p>
        <p><input type="text" name="email" placeholder="deer@doe.com"/></p>
        
        <p><label for="password">Password:</label></p>
        <p><input type="password" name="password" placeholder="Secret Password"/></p>
        
        <p><label for="verifyPass">Verify Password:</label></p>
        <p><input type="password" name="verifyPass" placeholder="Verify Password"/></p>
        
        <p><input type="submit" value="Register" class="btn btn-primary"/></p>
        <?= Form::token() ?>
        <br>
    </form>

@stop
