@extends('_master')

@section('active')

    <!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li class="active"><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif
	

@stop

@section('content')

@foreach ($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
    <br>
@endforeach
 <!-- Center form with bootstrap doing (12 - 3) / 2 = ~4 -->
 <div class="col-md-3 col-md-offset-4">

    <h2>Sign up</h2>
    <br>

    <form action="{{ url('register') }}" method="post">
        <!-- Allow for fancy font awesome bootstrap icons for all fields via classes-->
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i></span>
            <input class="form-control" type="text" name="username" placeholder="your username"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" name="given" placeholder="your first name"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa fa-users fa-fw"></i></span>
            <input class="form-control" type="text" name="sur" placeholder="your surname"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input class="form-control" type="text" name="email" placeholder="your email"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" name="password" placeholder="password"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" name="verifyPass" placeholder="verify password"/>
        </div>
        <br>
        <p><input type="submit" value="Register" class="btn btn-primary"/></p>
        
        <!--Generate token for CSRF protection-->
        <?= Form::token() ?>
        <br>
    </form>
</div>

@stop
